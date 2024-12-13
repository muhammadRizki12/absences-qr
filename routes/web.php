<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// middleware
// Routes untuk Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboardadmin', [AuthController::class, 'dashboardadmin'])->name('dashboardadmin');
});

// Routes untuk Guru
Route::middleware(['guru'])->group(function () {
    Route::get('/dashboardguru', [AuthController::class, 'dashboardguru'])->name('dashboardguru');
});

// classes
Route::get('/classes/create', [ClassController::class, 'create'])->name('class.create');
Route::get('/classes', [ClassController::class, 'index'])->name('class.index');
Route::get('/classes/{id}', [ClassController::class, 'show'])->name('class.show');
Route::post('/classes', [ClassController::class, 'store'])->name('class.store');
Route::get('/classes/{id}/edit', [ClassController::class, 'edit'])->name('class.edit');
Route::put('/classes', [ClassController::class, 'update'])->name('class.update');
Route::delete('/classes', [ClassController::class, 'destroy'])->name('class.destroy');

// Abcences
Route::get('/absences', [AbsenceController::class, 'index'])->name('absence.index');
Route::get('/absences/scan-qr', [AbsenceController::class, 'scanQR'])->name('absence.scanQR');
Route::get('/absences/{class_name}', [AbsenceController::class, 'store'])->name('absence.store');
Route::post('/absences/{class_name}', [AbsenceController::class, 'huha'])->name('absence.huha');

// Auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// dashboard
Route::get('/dashboard/dashboardadmin', [AuthController::class, 'dashboardadmin'])->name('dashboardadmin');
// Route::get('/dashboard/dashboardguru', [GuruController::class, 'dashboardguru'])->name('dashboardguru');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboardadmin', [AuthController::class, 'dashboardadmin'])->name('dashboardadmin');
});

// Users
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Schedules
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedule.create');
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedule.store');
Route::get('/schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

// about
Route::get('/about', [AuthController::class, 'about'])->name('about');
