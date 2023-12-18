<?php

use App\Http\Controllers\ExpressAuthController;
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


Route::group(['middleware' => ['guest:express_user']], function () {
    Route::get('express/login', [ExpressAuthController::class, 'loginView'])->name('express.login');
    Route::post('express/login', [ExpressAuthController::class, 'login'])->name('express.login');
    Route::get('express/forgot/password', [ExpressAuthController::class, 'forgotPasswordView'])->name('express.forgot.password');
    Route::post('express/forgot/password', [ExpressAuthController::class, 'forgotPassword'])->name('express.forgot.password');
    Route::get('express/forgot/{link}/{id}', [ExpressAuthController::class, 'forgotPasswordViewLink'])->name('express.forgot.link');
    Route::post('express/forgot/reset', [ExpressAuthController::class, 'resetPassword'])->name('express.forgot.reset');
});
Route::group(['middleware' => ['auth:express_user']], function () {
    Route::get('express/dashboard', [ExpressAuthController::class, 'dashboard'])->name('express.dashboard');
    Route::get('express/change/password', [ExpressAuthController::class, 'changePasswordView'])->name('express.change.password');
    Route::post('express/change/password', [ExpressAuthController::class, 'changePassword'])->name('express.change.password');
    Route::get('express/logout', [ExpressAuthController::class, 'logout'])->name('express.logout');
});
