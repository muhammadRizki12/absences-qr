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

// classes
Route::get('/classes', [ClassController::class, 'index'])->name('class.index');
Route::get('/classes/create', [ClassController::class, 'create'])->name('class.create');
Route::post('/classes', [ClassController::class, 'store'])->name('class.store');

// Abcences
Route::get('/absences/{class_name}', [AbsenceController::class, 'index'])->name('absence.index');

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Users
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');

// Schedules
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedule.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedule.store');
