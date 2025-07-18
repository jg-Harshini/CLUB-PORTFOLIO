<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Club;
use App\Models\Event;
use App\Models\StudentCoordinator;

class SuperadminController extends Controller
{
    public function clubs(Request $request, $action = null, $id = null)
    {
        switch ($action) {
            case 'create':
                if ($request->isMethod('post')) {
                    $request->validate([
                        'club_name' => 'required|string|max:255',
                        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'introduction' => 'required|string',
                        'mission' => 'required|string',
                        'staff_coordinator_name' => 'required|string|max:255',
                        'staff_coordinator_email' => 'nullable|email|max:255',
                        'staff_coordinator_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'year_started' => 'required|integer',
                    ]);

                    $logoPath = $request->file('logo')->store('club_logos', 'public');
                    $staffPhotoPath = $request->hasFile('staff_coordinator_photo')
                        ? $request->file('staff_coordinator_photo')->store('staff_photos', 'public')
                        : null;

                    Club::create([
                        'club_name' => $request->club_name,
                        'logo' => $logoPath,
                        'introduction' => $request->introduction,
                        'mission' => $request->mission,
                        'staff_coordinator_name' => $request->staff_coordinator_name,
                        'staff_coordinator_email' => $request->staff_coordinator_email,
                        'staff_coordinator_photo' => $staffPhotoPath,
                        'year_started' => $request->year_started,
                    ]);

                    return redirect()->back()->with('success', 'Club created successfully!');
                }
                return view('clubs.create');

            case 'edit':
                $club = Club::findOrFail($id);

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

                    $studentIds = $request->student_ids ?? [];
                    $studentNames = $request->student_names ?? [];
                    $studentPhotos = $request->file('student_photos') ?? [];

                    foreach ($studentNames as $index => $name) {
                        $studentId = $studentIds[$index] ?? null;

                        if ($studentId) {
                            $student = StudentCoordinator::find($studentId);
                            if ($student) {
                                $student->name = $name;

                                if (isset($studentPhotos[$index])) {
                                    Storage::disk('public')->delete($student->photo);
                                    $student->photo = $studentPhotos[$index]->store('student_photos', 'public');
                                }

                                $student->save();
                            }
                        } elseif ($name) {
                            $newStudent = new StudentCoordinator();
                            $newStudent->name = $name;
                            $newStudent->club_id = $club->id;

                            if (isset($studentPhotos[$index])) {
                                $newStudent->photo = $studentPhotos[$index]->store('student_photos', 'public');
                            }

                            $newStudent->save();
                        }
                    }

                    return redirect('/tce/superadmin/clubs')->with('success', 'Club updated successfully!');
                }

                return view('clubs.edit', compact('club'));

            case 'delete':
                $club = Club::findOrFail($id);
                Storage::disk('public')->delete([$club->logo, $club->staff_coordinator_photo]);
                $club->delete();
                return redirect()->back()->with('success', 'Club deleted successfully!');

            case 'profile':
                $club = Club::with('events')->findOrFail($id);
                return view('clubs.profile', [
                    'club' => $club,
                    'layout' => 'layout.app',
                    'baseUrl' => url('/tce/superadmin/events')
                ]);

            default:
                $clubs = Club::all();
                return view('clubs.index', compact('clubs'));
        }
    }

    public function events(Request $request, $action = null, $id = null)
    {
        switch ($action) {
            case 'create':
                if ($request->isMethod('post')) {
                    $request->validate([
                        'club_id' => 'required|exists:clubs,id',
                        'event_name' => 'required|string|max:255',
                        'description' => 'nullable|string',
                        'start_date' => 'required|date',
                        'end_date' => 'required|date',
                        'start_time' => 'required',
                        'end_time' => 'required',
                        'participants' => 'nullable|integer|min:0',
                        'coordinators' => 'nullable|integer|min:0',
                        'best_performance' => 'nullable|integer|min:0',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'winner_name' => 'nullable|string|max:255',
                        'winner_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    $data = $request->only([
                        'club_id', 'event_name', 'description', 'start_date', 'end_date', 'start_time', 'end_time', 'participants', 'coordinators', 'best_performance', 'winner_name'
                    ]);

                    if ($request->hasFile('image')) {
                        $data['image_path'] = $request->file('image')->store('event_images', 'public');
                    }

                    if ($request->hasFile('winner_photo')) {
                        $data['winner_photo'] = $request->file('winner_photo')->store('winner_photos', 'public');
                    }

                    if ($request->hasFile('gallery')) {
                        $galleryPaths = [];

                        foreach ($request->file('gallery') as $image) {
                            if ($image->isValid()) {
                                $path = $image->store('event_gallery', 'public');
                                $galleryPaths[] = $path;
                            }
                        }

                        $data['gallery'] = json_encode($galleryPaths);
                    }

                    Event::create($data);

                    return redirect()->back()->with('success', 'Event added successfully!');
                }

                return view('events.create');

            case 'view':
                $event = Event::findOrFail($id);
                return view('events.view', compact('event'));
            
            case 'edit':
                $event = Event::findOrFail($id);

                if ($request->isMethod('post')) {
                    $request->validate([
                        'event_name' => 'required|string|max:255',
                        'description' => 'nullable|string',
                        'start_date' => 'required|date',
                        'end_date' => 'required|date',
                        'start_time' => 'required',
                        'end_time' => 'required',
                        'participants' => 'nullable|integer|min:0',
                        'coordinators' => 'nullable|integer|min:0',
                        'best_performance' => 'nullable|integer|min:0',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'winner_name' => 'nullable|string|max:255',
                        'winner_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

                    if ($request->hasFile('image')) {
                        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                            Storage::disk('public')->delete($event->image_path);
                        }
                        $event->image_path = $request->file('image')->store('event_images', 'public');
                    }

                    if ($request->hasFile('winner_photo')) {
                        if ($event->winner_photo && Storage::disk('public')->exists($event->winner_photo)) {
                            Storage::disk('public')->delete($event->winner_photo);
                        }
                        $event->winner_photo = $request->file('winner_photo')->store('winner_photos', 'public');
                    }

                    if ($request->hasFile('gallery')) {
                        $existingGallery = json_decode($event->gallery ?? '[]', true);

                        foreach ($request->file('gallery') as $image) {
                            $path = $image->store('event_gallery', 'public');
                            $existingGallery[] = $path;
                        }

                        $event->gallery = json_encode($existingGallery);
                        $event->save();
                    }

                    $event->update([
                        'event_name' => $request->event_name,
                        'description' => $request->description,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'start_time' => $request->start_time,
                        'end_time' => $request->end_time,
                        'participants' => $request->participants,
                        'coordinators' => $request->coordinators,
                        'best_performance' => $request->best_performance,
                        'winner_name' => $request->winner_name,
                    ]);

                    return redirect()->route('superadmin.clubs', ['action' => 'profile', 'id' => $event->club_id])
                                     ->with('success', 'Event updated successfully!');
                }

                return view('events.edit', [
                    'event' => $event,
                    'formRoute' => url('/superadmin/events/edit/' . $event->id)
                ]);

            case 'delete':
                $event = Event::findOrFail($id);

                if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                    Storage::disk('public')->delete($event->image_path);
                }

                $event->delete();

                return redirect()->back()->with('success', 'Event deleted successfully!');

            default:
                $events = Event::with('club')->get();
                return view('events.index', compact('events'));
        }
    }

    public function dashboard()
    {
        $totalClubs = DB::table('clubs')->count();
        $totalApplications = DB::table('club_registration')->count();
        $totalStudents = DB::table('registrations')->count();

        $recentRegistrations = DB::table('registrations')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $departmentDistribution = DB::table('registrations')
            ->select('department', DB::raw('count(*) as total'))
            ->groupBy('department')
            ->pluck('total', 'department')
            ->toArray();

        $popularClubs = DB::table('club_registration')
            ->join('clubs', 'club_registration.club_id', '=', 'clubs.id')
            ->select('clubs.club_name', DB::raw('count(*) as total'))
            ->groupBy('clubs.club_name')
            ->orderByDesc('total')
            ->limit(5)
            ->pluck('total', 'clubs.club_name')
            ->toArray();$activeClubsByEvents = DB::table('events')
        ->join('clubs', 'events.club_id', '=', 'clubs.id')
        ->select('clubs.club_name', DB::raw('count(events.id) as total_events'))
        ->groupBy('clubs.club_name')
        ->orderByDesc('total_events')
        ->limit(5)
        ->pluck('total_events', 'clubs.club_name')
        ->toArray();

    $rawData = DB::table('registrations')
    ->select('gender', DB::raw('count(*) as count'))
    ->groupBy('gender')
    ->pluck('count', 'gender'); // returns: ['Male' => 50, null => 5, etc.]

$genderDistribution = [
    'Male' => 0,
    'Female' => 0,
    'Other' => 0
];

foreach ($rawData as $key => $value) {
    $key = strtolower(trim((string) $key)); // safely handle null or blanks

    if ($key === 'male') {
        $genderDistribution['Male'] += $value;
    } elseif ($key === 'female') {
        $genderDistribution['Female'] += $value;
    } elseif ($key === 'other') {
        $genderDistribution['Other'] += $value;
    } else {
        // Anything else (null, blank, typos) goes to "Other"
        $genderDistribution['Other'] += $value;
    }
}

    return view('dash', compact(
    'totalClubs',
    'totalApplications',
    'totalStudents',
    'recentRegistrations',
    'departmentDistribution',
    'popularClubs',
    'activeClubsByEvents',
    'genderDistribution' // 👈 add this
));

    }

    public function enrollments()
    {
        $students = \App\Models\Registration::join('club_registration', 'registrations.id', '=', 'club_registration.registration_id')
            ->join('clubs', 'clubs.id', '=', 'club_registration.club_id')
            ->select(
                'registrations.name',
                'registrations.department',
                'clubs.club_name as club_enrolled'
            )
            ->get();

        $departments = [
            'CSE', 'IT', 'ECE', 'EEE', 'MECH', 'CIVIL', 'DS', 'AI-ML',
            'MECT', 'CSBS', 'ARCH'
        ];

        $clubs = \App\Models\Club::select('club_name')->get();

        return view('table', [
            'students' => $students,
            'departments' => $departments,
            'clubs' => $clubs,
        ]);
    }
 public function printReport($id)
{
    $event = Event::with('club')->findOrFail($id); // Load the related club
    $eventImages = json_decode($event->gallery ?? '[]');
    $eventImages = array_slice($eventImages, 0, 4); // Up to 4 images

    return view('events.report', [
        'event' => $event,
        'eventImages' => $eventImages,
    ]);
}

}
