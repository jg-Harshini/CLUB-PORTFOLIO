<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // 1. Show all clubs (index.blade.php)
public function index()
{
    $today = now()->toDateString();

    // Get up to 6 upcoming events
    $upcoming = \App\Models\Event::with('club')
        ->where('date', '>=', $today)
        ->orderBy('date')
        ->take(6)
        ->get();

    $count = $upcoming->count();

    if ($count < 6) {
        $fillCount = 6 - $count;

        // Get recently completed events to fill the rest
        $recent = \App\Models\Event::with('club')
            ->where('date', '<', $today)
            ->orderByDesc('date')
            ->take($fillCount)
            ->get();

        $events = $upcoming->concat($recent);
    } else {
        $events = $upcoming;
    }

    // Get first 6 clubs alphabetically
    $clubs = \App\Models\Club::orderBy('club_name')->take(9)->get();

    return view('student.index', compact('clubs', 'events'));
}

public function committee()
{
    return view('student.commitee');
}

public function showAllClubs()
{
    $clubs = Club::orderBy('club_name')->get();
    return view('student.clubs', compact('clubs'));
}
public function showEventDetails($id)
{
    $event = Event::with('club')->findOrFail($id);
    return view('student.event-details', compact('event'));
}

public function viewClubDetails($id)
{
    $club = Club::with('events')->findOrFail($id); // Eager load events if available
    return view('student.club-details', compact('club'));
}
    // 2. Show events page with optional club filter (events.blade.php)
    public function events(Request $request)
    {
        $clubId = $request->input('club_id');
        $query = Event::with('club');

        if ($clubId) {
            $query->where('club_id', $clubId);
        }

        $events = $query->orderBy('date')->get();
        $today = now()->toDateString();

        $upcoming = $events->where('date', '>=', $today);
        $completed = $events->where('date', '<', $today);
        $clubs = Club::all();

        return view('student.events', compact('upcoming', 'completed', 'clubs', 'clubId'));
    }

    // 3. Show enroll form (enroll.blade.php)
    public function showEnrollForm()
    {
        $clubs = Club::all();
        $departments = [
            'CSE', 'IT', 'ECE', 'EEE', 'MECH', 'CIVIL', 'DS', 'AI-ML',
            'MECT', 'CSBS', 'ARCH'
        ];

        return view('student.enroll', compact('clubs', 'departments'));
    }

    // 4. Store student registration
    public function enroll(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'roll_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'department' => 'required|string',
            'clubs' => 'required|array|min:1|max:3',
        ]);

        // Check for duplicate registration
        $alreadyRegistered = Registration::where('roll_no', $request->roll_no)
            ->orWhere('email', $request->email)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->route('student.enroll.form')
                ->with('popup_message', '⚠️ Already registered using this Roll No or Email.')
                ->with('popup_type', 'warning')
                ->with('redirect_to', 'form');
        }

        // Check if any selected club has reached the limit
        foreach ($request->clubs as $clubId) {
            $count = DB::table('club_registration')->where('club_id', $clubId)->count();
            if ($count >= 100) {
                $club = Club::find($clubId);
                return redirect()->route('student.enroll.form')
                    ->with('popup_message', '❌ ' . $club->club_name . ' has reached its limit.')
                    ->with('popup_type', 'danger')
                    ->with('redirect_to', 'form');
            }
        }

        // Upload photo
        $photoPath = $request->file('photo')->store('photos', 'public');

        // Save student info
        $registration = Registration::create([
            'name' => $request->name,
            'roll_no' => $request->roll_no,
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'department' => $request->department,
        ]);

        // Register selected clubs
        foreach ($request->clubs as $clubId) {
            DB::table('club_registration')->insert([
                'registration_id' => $registration->id,
                'club_id' => $clubId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('student.enroll.form')
            ->with('popup_message', '🎉 Registration successful!')
            ->with('popup_type', 'success')
            ->with('redirect_to', 'home');
    }
}
