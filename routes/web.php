<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClubAdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HodController;

/*
|--------------------------------------------------------------------------
| ROOT REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/tce/login');
});

Route::get('/login', function () {
    return redirect()->route('login.form');
})->name('login');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('tce')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
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

/*
|--------------------------------------------------------------------------
| SUPERADMIN ROUTES (auth + role check)
|--------------------------------------------------------------------------
*/
Route::prefix('tce/superadmin')->middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::match(['get', 'post'], '/clubs/{action?}/{id?}', [SuperadminController::class, 'clubs'])->name('superadmin.clubs');
    Route::match(['get', 'post'], '/events/{action?}/{id?}', [SuperadminController::class, 'events'])->name('superadmin.events');
    Route::match(['get', 'post'], '/faculties/{action?}/{id?}', [SuperadminController::class, 'faculties'])->name('superadmin.faculties');
    Route::match(['get', 'post'], '/students/{action?}/{id?}', [SuperadminController::class, 'students'])->name('superadmin.students');
    Route::get('/events/view/{id}', [SuperadminController::class, 'viewEvent'])->name('superadmin.events.view');
    Route::get('/events/print/{id}', [SuperadminController::class, 'printReport'])->name('superadmin.events.print');
    Route::get('/enrollments', [SuperadminController::class, 'enrollments'])->name('superadmin.enrollments');
});

/*
|--------------------------------------------------------------------------
| CLUB ADMIN ROUTES (auth + role check)
|--------------------------------------------------------------------------
*/
Route::prefix('clubadmin')->middleware(['auth', 'role:club_admin'])->group(function () {
    Route::get('/dashboard', [ClubAdminController::class, 'dashboard'])->name('clubadmin.dashboard');
    Route::get('/profile', [ClubAdminController::class, 'profile'])->name('clubadmin.profile');
    Route::match(['get', 'post'], '/events/{action?}/{id?}', [ClubAdminController::class, 'events'])->name('clubadmin.events');
    Route::get('/enrollments', [ClubAdminController::class, 'enrollments'])->name('clubadmin.enrollments');
    Route::post('/enrollments/action', [ClubAdminController::class, 'approveOrRejectEnrollments'])->name('clubadmin.enrollments.action');

    // exports
    Route::get('/export/excel', [EnrollmentController::class, 'exportExcel'])->name('clubadmin.export.excel');
    Route::get('/export/pdf', [EnrollmentController::class, 'exportPDF'])->name('clubadmin.export.pdf');
});

/*
|--------------------------------------------------------------------------
| HOD ROUTES (auth + role check)
|--------------------------------------------------------------------------
*/
Route::prefix('hod')->middleware(['auth', 'role:hod'])->group(function () {
    Route::get('/dashboard', [HodController::class, 'index'])->name('hod.dashboard');
    Route::get('/clubs', [HodController::class, 'clubs'])->name('hod.clubs');
    Route::get('/clubs/view/{id}', [HodController::class, 'clubs'])->name('hod.clubs.show')->defaults('action', 'view');
    Route::get('/clubs/{clubId}/events/view/{id}', [HodController::class, 'viewEvent'])->name('hod.clubs.events.view');
    Route::get('/events/edit/{id}', [HodController::class, 'editEvent'])->name('hod.events.edit');
    Route::get('/enrollments', [HodController::class, 'enrollments'])->name('hod.enrollments');
    Route::get('/events/print/{id}', [HodController::class, 'print'])->name('hod.events.print');

    // exports
    Route::get('/export/excel', [EnrollmentController::class, 'exportExcel'])->name('hod.export.excel');
    Route::get('/export/pdf', [EnrollmentController::class, 'exportPDF'])->name('hod.export.pdf');
});
