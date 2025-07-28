<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class StudentController extends Controller
{
    // 1. Show all clubs (index.blade.php)
    public function index()
    {
        $today = now()->toDateString();

        // Get up to 6 upcoming events
        $upcoming = Event::with('club')
            ->where('date', '>=', $today)
            ->orderBy('date')
            ->take(6)
            ->get();

        $count = $upcoming->count();

        if ($count < 6) {
            $fillCount = 6 - $count;

            // Get recently completed events to fill the rest
            $recent = Event::with('club')
                ->where('date', '<', $today)
                ->orderByDesc('date')
                ->take($fillCount)
                ->get();

            $events = $upcoming->concat($recent);
        } else {
            $events = $upcoming;
        }

        // Get first 6 clubs alphabetically
        $clubs = Club::orderBy('club_name')->take(9)->get();

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
        $clubs = Club::orderBy('club_name')->get();
        $departments = [
            'CSE', 'IT', 'ECE', 'EEE', 'MECH', 'CIVIL', 'AMCS', 'AI-ML',
            'MECT', 'CSBS', 'ARCH'
        ];
        sort($departments);

        return view('student.enroll', compact('clubs', 'departments'));
    }
    public function enroll(Request $request)
{
    try {
        Log::info('📥 Registration request received', ['request' => $request->all()]);

        // ✅ Step 1: Validate data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'roll_no' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:Male,Female,other',
            'department' => 'required|string|max:255',
            'clubs' => 'required|array',
            'clubs.*' => 'exists:clubs,id'
        ]);

        Log::info('✅ Validation passed', ['validatedData' => $validatedData]);

        // ✅ Step 2: Store in registrations table
        $registration = Registration::create([
            'name' => $validatedData['name'],
            'roll_no' => $validatedData['roll_no'],
            'email' => $validatedData['email'],
            'gender' => $validatedData['gender'],
            'department' => $validatedData['department'],
        ]);

        Log::info('🗃️ Registration created', ['registration_id' => $registration->id]);

        // ✅ Step 3: Attach clubs (many-to-many)
        try {
            Log::info('📌 Attaching clubs', ['clubs' => $validatedData['clubs']]);
            $registration->clubs()->attach($validatedData['clubs']);
            Log::info('✅ Clubs attached successfully');
        } catch (\Exception $e) {
            Log::error('❌ Error during club attach: ' . $e->getMessage());
        }

        $clubNames = Club::whereIn('id', $validatedData['clubs'])->pluck('club_name')->toArray();

$emailData = [
        'name' => $validatedData['name'],
        'roll_no' => $validatedData['roll_no'],
        'email' => $validatedData['email'],
        'department' => $validatedData['department'],
        'clubs' => $clubNames,
    ];

   try{ // Send email
    Mail::to($validatedData['email'])->send(new RegistrationSuccessMail($emailData));

    Log::info("✅ Registration success mail sent to " . $validatedData['email']);
} catch (\Exception $e) {
    Log::error("❌ Error sending mail: " . $e->getMessage());
}


        // ✅ Step 5: Return response or view
        return redirect()->back()->with('popup_message', 'Registration successful!');

    } catch (\Exception $e) {
        Log::error('❌ Unexpected error in registration: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}
}
