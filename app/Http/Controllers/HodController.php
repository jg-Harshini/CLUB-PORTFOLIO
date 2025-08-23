<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Registration;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EnrollmentsExport;


class HodController extends Controller
{
    public function index()
    {
        $hodDeptId = auth()->user()->department_id;
$hod=auth()->user();
        // Clubs under HOD's department
        $clubs = Club::where('department_id', $hodDeptId)->get();
        $clubIds = $clubs->pluck('id');

        // Total number of clubs
        $totalClubs = $clubs->count();
        $departmentName = DB::table('departments')
    ->where('id', $hodDeptId)
    ->value('name');

        $totalApplications = DB::table('club_registration as cr')
    ->join('registrations as r', 'cr.registration_id', '=', 'r.id')
    ->where('r.department', $departmentName) // Only IT students
    ->count();

$totalStudents = DB::table('club_registration as cr')
    ->join('registrations as r', 'cr.registration_id', '=', 'r.id')
    ->where('r.department', $departmentName) // Only IT students
    ->distinct('cr.registration_id')
    ->count('cr.registration_id');


       $popularClubs = DB::table('club_registration')
    ->join('registrations', 'club_registration.registration_id', '=', 'registrations.id')
    ->join('clubs', 'club_registration.club_id', '=', 'clubs.id')
    ->where('registrations.department', $departmentName) // only your dept's students
    ->groupBy('clubs.id', 'clubs.club_name')
    ->select('clubs.club_name', DB::raw('count(*) as total'))
    ->orderByDesc('total')
    ->take(3)
    ->pluck('total', 'clubs.club_name');

    $activeClubsByEvents = DB::table('events')
    ->join('clubs', 'events.club_id', '=', 'clubs.id')
    ->whereIn('clubs.id', $clubIds)
    ->groupBy('clubs.club_name')
    ->select('clubs.club_name', DB::raw('count(*) as total'))
    ->pluck('total', 'clubs.club_name');  // FIXED: use 'clubs.club_name'

// ✅ Gender Distribution of students
$genderDistribution = DB::table('registrations')
    ->where('department', $departmentName)
    ->select('gender', DB::raw('COUNT(*) as total'))
    ->groupBy('gender')
    ->pluck('total', 'gender');

// ✅ Normalize to include both genders even if 0
$genderDistribution = [
    'Male' => $genderDistribution['Male'] ?? 0,
    'Female' => $genderDistribution['Female'] ?? 0,
];

// ✅ Pass normalized to view
return view('hod.dash', compact(
    'totalClubs',
    'totalApplications',
    'totalStudents',
    'popularClubs',
    'activeClubsByEvents',
    'genderDistribution', // 👈 not genderDistribution
    'departmentName'
));


    }

public function clubs(Request $request, $id = null, $action = null)
    {
        $hod = Auth::user();
        $deptId = $hod->department_id;

        switch ($action) {
            case 'edit':
                $club = Club::where('department_id', $deptId)->findOrFail($id);

                if ($request->isMethod('post')) {
                    $request->validate([
                        'club_name' => 'required|string|max:255',
                        'staff_coordinator_email' => 'required|email',
                    ]);

                    $club->club_name = $request->club_name;
                    $club->introduction = $request->introduction;
                    $club->mission = $request->mission;
                    $club->staff_coordinator_name = $request->staff_coordinator_name;
                    $club->staff_coordinator_email = $request->staff_coordinator_email;
                    $club->year_started = $request->year_started;

                    if ($request->hasFile('logo')) {
                        Storage::disk('public')->delete($club->logo);
                        $club->logo = $request->file('logo')->store('club_logos', 'public');
                    }

                    if ($request->hasFile('staff_coordinator_photo')) {
                        Storage::disk('public')->delete($club->staff_coordinator_photo);
                        $club->staff_coordinator_photo = $request->file('staff_coordinator_photo')->store('staff_photos', 'public');
                    }

                    $club->save();

                    return redirect('/hod/clubs')->with('success', 'Club updated successfully!');
                }

return view('clubs.edit', compact('club'))->with('layout', 'layout.hod');

            case 'view':
                $club = Club::where('department_id', $deptId)->findOrFail($id);
                $baseUrl = url('/hod/clubs/' . $club->id . '/events');
return view('hod.club-view', compact('club', 'baseUrl'))->with('layout', 'layout.hod');

            default:
                $departmentId = $hod->department_id;

            $departmentName = DB::table('departments')
    ->where('id', $departmentId)
    ->value('name');
    

                $clubs = Club::where('department_id', $deptId)->get();
return view('hod.clubs', [
    'clubs' => $clubs,
    'department' => $departmentName
]);
        }
    }
    
   
public function viewEvent($clubId, $id)
{
    $event = Event::findOrFail($id);
    $layout = 'layout.hod';
    $baseUrl = "/tce/hod/clubs/{$clubId}/events";

    return view('events.view', compact('event', 'layout', 'baseUrl'));
}


public function print($id)
{
    $event = Event::with('club')->findOrFail($id);
    $eventImages = json_decode($event->gallery ?? '[]');
    $eventImages = array_slice($eventImages, 0, 4); // Limit to 4 images
    $layout = 'layout.hod'; // Or your correct HOD layout

    return view('events.report', [
        'event' => $event,
        'eventImages' => $eventImages,
        'layout' => $layout,
    ]);
}


public function enrollments()
{
    $hod = auth()->user(); // assuming HOD is logged in
    $departmentId = $hod->department_id;

    // Get department name from departments table
$departmentName = DB::table('departments')
    ->where('id', $departmentId)
    ->value('name');

    // Get all students with that department name
    $students = Registration::with('clubs')
        ->where('department', $departmentName)
        ->get()
        ->map(function ($student) {
            return [
                'name' => $student->name,
                'club_enrolled' => $student->clubs->pluck('club_name')->join(', '),
            ];
        });

    // Get clubs in this department (using department_id)
$clubs = Club::orderBy('club_name', 'asc')->get();

    return view('hod.enrollments', [
        'students' => $students,
        'clubs' => $clubs,
        'department' => $departmentName
    ]);
}


public function exportExcel()
{
    return Excel::download(new EnrollmentsExport, 'enrollments.xlsx');
}



}
