<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationRejectedMail;
use App\Mail\RegistrationSuccessMail;
use App\Models\Club;
use App\Models\Registration;
use App\Models\Event;
use Carbon\Carbon;
class ClubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Keep 'auth' middleware to ensure user is logged in
        // Removed 'club_admin' middleware
    }

    

public function dashboard()
{
    $clubId = Auth::user()->club_id;
$clubName = \App\Models\Club::where('id', $clubId)->value('club_name');

    // Total students registered to this club
$totalStudents = DB::table('club_registration')->where('club_id', $clubId)->count();

    // Department-wise Distribution
    $departmentDistribution = Registration::join('club_registration', 'registrations.id', '=', 'club_registration.registration_id')
        ->where('club_registration.club_id', $clubId)
        ->select('department', DB::raw('count(*) as total'))
        ->groupBy('department')
        ->pluck('total', 'department')
        ->toArray();

    // Gender-wise Distribution
    $rawGender = Registration::join('club_registration', 'registrations.id', '=', 'club_registration.registration_id')
        ->where('club_registration.club_id', $clubId)
        ->select('gender', DB::raw('count(*) as count'))
        ->groupBy('gender')
        ->pluck('count', 'gender');

    $genderDistribution = [
        'Male' => 0,
        'Female' => 0,
        'Other' => 0
    ];

    foreach ($rawGender as $key => $value) {
        $key = strtolower(trim((string) $key));
        if ($key === 'male') {
            $genderDistribution['Male'] += $value;
        } elseif ($key === 'female') {
            $genderDistribution['Female'] += $value;
        } else {
            $genderDistribution['Other'] += $value;
        }
    }
return view('dashboard', compact(
    'totalStudents',
    'departmentDistribution',
    'genderDistribution',
    'clubName'
));

}

public function enrollments(Request $request)
{
    $clubId = Auth::user()->club_id;

$query = Registration::select(
    'registrations.name',
    'registrations.roll_no',
    'registrations.department',
    'club_registration.id as club_reg_id',
    'club_registration.status' // 👈 add this line
)
->join('club_registration', 'registrations.id', '=', 'club_registration.registration_id')
->where('club_registration.club_id', $clubId);


    $departmentFilter = $request->query('department');
    if ($departmentFilter) {
        $query->where('registrations.department', $departmentFilter);
    }

    $students = $query->get();
    $departments = Registration::distinct()->pluck('department');

    return view('enrollments', compact('students', 'departments'));
}



public function approveOrRejectEnrollments(Request $request)
{
    $request->validate([
        'selected_ids' => 'required|array',
        'action' => 'required|string|in:accept,reject',
    ]);

    $selectedIds = $request->input('selected_ids');
    $action = $request->input('action');

    if ($action === 'reject') {
        foreach ($selectedIds as $id) {
            $clubReg = DB::table('club_registration')->where('id', $id)->first();
            
            if ($clubReg) {
                $registration = \App\Models\Registration::find($clubReg->registration_id);
                $club = \App\Models\Club::find($clubReg->club_id);

                if ($registration && $club) {
                    $data = [
                        'name' => $registration->name,
                        'club' => $club->club_name,
                    ];

Mail::to($registration->email)->queue(new RegistrationRejectedMail($data));
                }

                // Delete the record after email
                DB::table('club_registration')->where('id', $id)->delete();
            }
        }

        $message = 'Selected students have been rejected and emails sent.';
    } else {
        DB::table('club_registration')->whereIn('id', $selectedIds)->update(['status' => 'accepted']);
        $message = 'Selected students have been accepted.';
    }

    if ($request->ajax()) {
        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    return back()->with('success', $message);
}





   public function profile()
{
    if (!Auth::check() || Auth::user()->role !== 'club_admin') {
        abort(403, 'Unauthorized');
    }

    $clubId = Auth::user()->club_id;
    $club = Club::with('events')->findOrFail($clubId);

    return view('clubs.profile', [
        'club'    => $club,
        'layout'  => 'layout.clubadmin',
        'baseUrl' => url('/clubadmin/events'), // Used for edit/view buttons
    ]);
}

 public function events(Request $request, $action = null, $id = null)
    {
        if (!Auth::check() || Auth::user()->role !== 'club_admin') {
            abort(403, 'Unauthorized');
        }

        $clubId = Auth::user()->club_id;

        switch ($action) {
            case 'create':
                if ($request->isMethod('post')) {
                    $data = $request->validate([
                       'event_name'       => 'required|string|max:255',
                        'description'      => 'nullable|string',
                        'start_date'       => 'required|date',
                        'end_date'         => 'required|date',
                        'start_time'       => 'required',
                        'end_time'         => 'required',
                        'participants'     => 'nullable|integer',
                        'coordinators'     => 'nullable|integer',
                        'best_performance' => 'nullable|integer',
                        'chief_guest'      => 'nullable|string|max:255',
                        'winner_name'      => 'nullable|string|max:255',
                        'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'winner_photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'gallery.*'        => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);
                    $data['club_id'] = $clubId;

                    if ($request->hasFile('image')) {
                        $data['image_path'] = $request->file('image')->store('event_images', 'public');
                    }

                    Event::create($data);

                    return redirect()->route('clubadmin.profile')->with('success', 'Event created!');
                }

                return view('events.create', [
                    'layout' => 'layout.clubadmin',
                ]);

            case 'edit':
                $event = Event::where('club_id', $clubId)->findOrFail($id);

if ($request->isMethod('post') && $action === 'edit' && $id) {
                    $updates = $request->validate([
                        'event_name'       => 'required|string|max:255',
                        'description'      => 'nullable|string',
                        'start_date'       => 'required|date',
                        'end_date'         => 'required|date',
                        'start_time'       => 'required',
                        'end_time'         => 'required',
                        'participants'     => 'nullable|integer',
                        'coordinators'     => 'nullable|integer',
                        'best_performance' => 'nullable|integer',
                        'chief_guest'      => 'nullable|string|max:255',
                        'winner_name'      => 'nullable|string|max:255',
                        'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'winner_photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'gallery.*'        => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    if ($request->hasFile('image')) {
                        $updates['image_path'] = $request->file('image')->store('event_images', 'public');
                    }

                    if ($request->hasFile('winner_photo')) {
                        $updates['winner_photo'] = $request->file('winner_photo')->store('event_winners', 'public');
                    }

                    if ($request->hasFile('gallery')) {
                        $galleryPaths = [];
                        foreach ($request->file('gallery') as $image) {
                            $galleryPaths[] = $image->store('event_gallery', 'public');
                        }
                        $updates['gallery'] = json_encode($galleryPaths);
                    }

                    $event->update($updates);

                    return redirect()->route('clubadmin.profile')->with('success', 'Event updated!');
                }

                return view('events.edit', [
                    'event'     => $event,
                    'layout'    => 'layout.clubadmin',
                    'formRoute' => route('clubadmin.events', ['action' => 'edit', 'id' => $event->id]),
                ]);

            case 'delete':
                $event = Event::where('club_id', $clubId)->findOrFail($id);
                $event->delete();

                return redirect()->route('clubadmin.profile')->with('success', 'Event deleted!');

            case 'view':
                $event = DB::table('events')
                    ->join('clubs', 'events.club_id', '=', 'clubs.id')
                    ->leftJoin('departments', 'clubs.department_id', '=', 'departments.id')
                    ->select('events.*', 'clubs.club_name', 'departments.name as department_name')
                    ->where('events.club_id', $clubId)
                    ->where('events.id', $id)
                    ->firstOrFail();

                return view('events.view', [
                    'event'  => $event,
                    'layout' => 'layout.clubadmin',
                ]);

            default:
                $events = Event::where('club_id', $clubId)->get();

                return view('events.view', [ // Optional: create separate index if needed
                    'events' => $events,
                    'layout' => 'layout.clubadmin',
                ]);
        }
    }

}
