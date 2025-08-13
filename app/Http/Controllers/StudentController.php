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

        // Get first 9 clubs alphabetically
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
        $club = Club::with('events')->findOrFail($id);
        return view('student.club-details', compact('club'));
    }

    // 2. Show events page
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

    // 3. Show enroll form
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

    public function getUserClubs(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $registration = Registration::where('email', $email)->first();

        if (!$registration) {
            return response()->json([
                'status' => 'no_registration',
                'tech_count' => 0,
                'non_tech_count' => 0,
                'registered_club_ids' => [],
            ]);
        }

        $clubs = $registration->clubs()->get(['clubs.id', 'club_name', 'category']);

        $techCount = $clubs->where('category', 'technical')->count();
        $nonTechCount = $clubs->where('category', 'non-technical')->count();
        $registeredClubIds = $clubs->pluck('id')->toArray();

        return response()->json([
            'status' => 'found',
            'tech_count' => $techCount,
            'non_tech_count' => $nonTechCount,
            'registered_club_ids' => $registeredClubIds,
        ]);
    }

    public function checkRegistrationLimits(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $registration = Registration::where('email', $email)->first();

        if (!$registration) {
            return response()->json([
                'status' => 'new_user',
                'max_tech' => 2,
                'max_non_tech' => 1,
                'current_tech_count' => 0,
                'current_non_tech_count' => 0,
            ]);
        }

        $currentTechCount = $registration->clubs()->where('category', 'technical')->count();
        $currentNonTechCount = $registration->clubs()->where('category', 'non-technical')->count();

        return response()->json([
            'status' => 'existing_user',
            'max_tech' => 2,
            'max_non_tech' => 1,
            'current_tech_count' => $currentTechCount,
            'current_non_tech_count' => $currentNonTechCount,
        ]);
    }

    public function enroll(Request $request)
    {
        try {
            Log::info('Registration request received', ['request' => $request->all()]);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'roll_no' => 'required|string|max:50',
                'email' => 'required|email|max:255',
                'gender' => 'required|in:Male,Female,other',
                'department' => 'required|string|max:255',
                'clubs' => 'required|array',
                'clubs.*' => 'exists:clubs,id'
            ]);

            Log::info('Validation passed', ['validatedData' => $validatedData]);

            $existingRegistration = Registration::where('email', $validatedData['email'])->first();
            Log::info('Existing registration found?', ['exists' => $existingRegistration ? 'yes' : 'no']);

            if ($existingRegistration) {
                $currentClubCount = $existingRegistration->clubs()->count();
                if ($currentClubCount >= 3) {
                    return redirect()->back()->with('error', 'You have already registered for the maximum number of clubs.');
                }

                $alreadyRegisteredClubIds = $existingRegistration->clubs()->pluck('clubs.id')->toArray();
                $newClubs = array_diff($validatedData['clubs'], $alreadyRegisteredClubIds);

                if (empty($newClubs)) {
                    return redirect()->back()->with('error', 'You are already registered for these clubs.');
                }

                $maxTech = 2;
                $maxNonTech = 1;
                $currentTechCount = $existingRegistration->clubs()->where('category', 'technical')->count();
                $currentNonTechCount = $existingRegistration->clubs()->where('category', 'non-technical')->count();

                $newTechCount = Club::whereIn('id', $newClubs)->where('category', 'technical')->count();
                $newNonTechCount = Club::whereIn('id', $newClubs)->where('category', 'non-technical')->count();

                if (($currentTechCount + $newTechCount) > $maxTech) {
                    return redirect()->back()->with('error', 'Tech club registration limit exceeded.');
                }

                if (($currentNonTechCount + $newNonTechCount) > $maxNonTech) {
                    return redirect()->back()->with('error', 'Non-Tech club registration limit exceeded.');
                }

                $existingRegistration->clubs()->attach($newClubs);

                return redirect()->back()->with('popup_message', 'Successfully registered for additional clubs!');
            } 
            else {
                $selectedClubs = Club::whereIn('id', $validatedData['clubs'])->get();
                $technicalCount = $selectedClubs->where('category', 'technical')->count();
                $nonTechnicalCount = $selectedClubs->where('category', 'non-technical')->count();

                if ($technicalCount > 2 || $nonTechnicalCount > 1) {
                    return redirect()->back()
                        ->with('popup_message', 'You can select a maximum of 2 Technical clubs and 1 Non-Technical club.')
                        ->withInput();
                }

                $registration = Registration::create([
                    'name' => $validatedData['name'],
                    'roll_no' => $validatedData['roll_no'],
                    'email' => $validatedData['email'],
                    'gender' => $validatedData['gender'],
                    'department' => $validatedData['department'],
                ]);

                $registration->clubs()->attach($validatedData['clubs']);

                $clubNames = $selectedClubs->pluck('club_name')->toArray();
                $emailData = [
                    'name' => $validatedData['name'],
                    'roll_no' => $validatedData['roll_no'],
                    'email' => $validatedData['email'],
                    'department' => $validatedData['department'],
                    'clubs' => $clubNames,
                ];

                try {
                    Mail::to($validatedData['email'])->send(new RegistrationSuccessMail($emailData));
                } catch (\Exception $e) {
                    Log::error("Error sending mail: " . $e->getMessage());
                }

                return redirect()->back()->with('popup_message', 'Registration successful!');
            }
        } 
        catch (\Exception $e) {
            Log::error('Unexpected error in registration: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
