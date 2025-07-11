<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| ROOT REDIRECT OR HOME PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| LOGIN ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', '❌ Email not found');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', '❌ Wrong password');
    }

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->intended('/tce/superadmin');
})->name('login.submit');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| SUPERADMIN ROUTES (Protected by auth)
|--------------------------------------------------------------------------
*/
Route::prefix('tce/superadmin')->middleware(['auth'])->group(function () {
    Route::get('/', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::match(['get', 'post'], '/clubs/{action?}/{id?}', [SuperadminController::class, 'clubs'])->name('superadmin.clubs');
    Route::match(['get', 'post'], '/events/{action?}/{id?}', [SuperadminController::class, 'events'])->name('superadmin.events');
    Route::match(['get', 'post'], '/faculties/{action?}/{id?}', [SuperadminController::class, 'faculties'])->name('superadmin.faculties');
    Route::match(['get', 'post'], '/students/{action?}/{id?}', [SuperadminController::class, 'students'])->name('superadmin.students');
    Route::get('/enrollments', [SuperadminController::class, 'enrollments'])->name('superadmin.enrollments');
});

/*
|--------------------------------------------------------------------------
| STUDENT ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('tce/student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/events', [StudentController::class, 'events'])->name('student.events');
    Route::get('/enroll', [StudentController::class, 'showEnrollForm'])->name('student.enroll.form');
    Route::post('/enroll', [StudentController::class, 'enroll'])->name('student.enroll.submit');
    Route::get('/clubs', [StudentController::class, 'showAllClubs'])->name('student.clubs.all');
    Route::get('/clubs/{id}', [StudentController::class, 'viewClubDetails'])->name('student.clubs.show');
    Route::get('/events/{id}', [StudentController::class, 'showEventDetails'])->name('student.event.details');
    Route::get('/commitee', [StudentController::class, 'committee'])->name('student.commitee');

});
