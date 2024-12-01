<?php

use App\Http\Controllers\AbcenceController;
use App\Http\Controllers\ClassController;
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
Route::get('/absences/{class_name}', [AbcenceController::class, 'index'])->name('abcence.index');
