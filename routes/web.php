<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;

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
    return view('welcome');
})->name('welcome');

// Apply 'auth' middleware to protect the following routes
Route::middleware(['auth'])->group(function () {
    // Student Dashboard Route
    Route::get('/student/studentDashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});

// Student Registration Routes
Route::get('/student/registration', [StudentController::class, 'create']);
Route::post('/student/registered', [StudentController::class, 'store']);

// Student Login Routes
Route::get('/student/login', [StudentController::class, 'showLoginForm']);
Route::post('/student/login', [StudentController::class, 'login']);





// Apply 'auth' middleware to protect the following routes
Route::middleware(['auth:teacher'])->group(function () {
    // Teacher Dashboard Route
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    
    // Add other routes here that require teacher authentication
    // For example, routes for managing classes, updating profile, etc.
});

// Teacher Registration Routes
Route::get('/teacher/register', [TeacherController::class, 'create'])->name('teacher.register.form');
Route::post('/teacher/register', [TeacherController::class, 'store'])->name('teacher.register.submit');

// Teacher Login Routes
Route::get('/teacher/login', [TeacherController::class, 'showLoginForm'])->name('teacher.login.view');
Route::post('/teacher/login', [TeacherController::class, 'login'])->name('teacher.login.submit');