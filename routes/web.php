<?php

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
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/student_data', function () {
    return view('student_data');
})->name('student_data');

Route::get('/report', function () {
    return view('report');
})->name('report');

Route::get('/professional_report', function () {
    return view('professional_report');
})->name('professional_report');

Route::get('/summary_student_report_one', function () {
    return view('summary_student_report_one');
})->name('summary_student_report_one');
