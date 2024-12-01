<?php

use App\Http\Controllers\backend\AttendeeController;
use App\Http\Controllers\backend\SpecialistController;
use App\Http\Controllers\frontend\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

// admin_dashboard
Route::get('/admin/dashboard', function () {
    return view('backend.admin_dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin_dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin login route

Route::middleware('guest:admin')->prefix('admin')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'check_user']);
});

Route::middleware('auth:admin')->prefix('admin')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::view('/admin/dashboard','backend.admin_dashboard');
    //specialist crud
    Route::resource('/specialist',SpecialistController::class);
    Route::resource('/attendee',AttendeeController::class);

});

// Attendee login route

Route::middleware('guest:attendee')->prefix('attendee')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Attendee\LoginController::class, 'login'])->name('attendee.login');
    Route::post('login', [App\Http\Controllers\Auth\Attendee\LoginController::class, 'check_user']);
});

Route::middleware('auth:attendee')->prefix('attendee')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Attendee\LoginController::class, 'logout'])->name('attendee.logout');

    Route::view('/dashboard','backend.attendee_dashboard');
});



