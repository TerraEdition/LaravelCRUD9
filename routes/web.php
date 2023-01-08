<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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
})->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->middleware('auth');
    Route::get('/{id}', [StudentController::class, 'show'])->middleware('auth');
    Route::get('/create', [StudentController::class, 'create'])->middleware('auth');
    Route::post('/', [StudentController::class, 'store'])->middleware('auth');
});

Route::prefix('teacher')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->middleware('auth');
    Route::get('/{id}', [TeacherController::class, 'show'])->middleware('auth');
    Route::get('/create', [TeacherController::class, 'create'])->middleware('auth');
    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->middleware('auth');
    Route::get('/bin', [TeacherController::class, 'bin'])->middleware('auth');
    Route::put('/restore/{id}', [TeacherController::class, 'restore'])->middleware('auth');
    Route::put('/{id}', [TeacherController::class, 'update'])->middleware('auth');
    Route::delete('/{id}', [TeacherController::class, 'softDestroy'])->middleware('auth');
    Route::delete('/delete/{id}', [TeacherController::class, 'hardDestroy'])->middleware('auth');
    Route::post('/', [TeacherController::class, 'store'])->middleware('auth');
});
Route::prefix('classroom')->group(function () {
    Route::get('/', [ClassRoomController::class, 'index'])->middleware('auth');
    Route::get('/{id}', [ClassRoomController::class, 'show'])->middleware('auth');
    Route::get('/create', [ClassRoomController::class, 'create'])->middleware('auth');
    Route::post('/', [ClassRoomController::class, 'store'])->middleware('auth');
});
Route::prefix('hobby')->group(function () {
    Route::get('/', [HobbyController::class, 'index'])->middleware(['auth', 'must-admin']);
    Route::get('/{id}', [HobbyController::class, 'show'])->middleware(['auth', 'must-admin']);
    Route::get('/create', [HobbyController::class, 'create'])->middleware(['auth', 'must-admin']);
    Route::post('/', [HobbyController::class, 'store'])->middleware(['auth', 'must-admin']);
});
