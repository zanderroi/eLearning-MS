<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

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

Route::get('/teacher-login', function () {
    return view('auth/teacherLogin');
})->name('teacherLogin');

Route::get('/student-login', function () {
    return view('auth/studentLogin');
})->name('studentLogin');

Route::get('/student-register', function () {
    return view('auth/studentRegister');
})->name('studentRegister');

Route::get('/teacher-register', function () {
    return view('auth/teacherRegister');
})->name('teacherRegister');
