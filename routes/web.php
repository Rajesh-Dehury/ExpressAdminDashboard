<?php

use App\Http\Controllers\ExpressAuthController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\StudentSearchController;
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
    return redirect()->route('express.login');
});
Route::get('/reportOne', function () {
    return view('report_one');
});
Route::get('/reportTwo', function () {
    return view('report_two');
});

Route::get('/report', function () {
    return view('report');
})->name('report');


Route::group(['middleware' => ['guest:express_client_admin']], function () {
    Route::get('express/login', [ExpressAuthController::class, 'loginView'])->name('express.login');
    Route::post('express/login', [ExpressAuthController::class, 'login'])->name('express.login');
    Route::get('express/forgot/password', [ExpressAuthController::class, 'forgotPasswordView'])->name('express.forgot.password');
    Route::post('express/forgot/password', [ExpressAuthController::class, 'forgotPassword'])->name('express.forgot.password');
    Route::get('express/forgot/{link}/{id}', [ExpressAuthController::class, 'forgotPasswordViewLink'])->name('express.forgot.link');
    Route::post('express/forgot/reset', [ExpressAuthController::class, 'resetPassword'])->name('express.forgot.reset');
});
Route::group(['middleware' => ['auth:express_client_admin']], function () {
    Route::get('express/dashboard', [ExpressAuthController::class, 'dashboard'])->name('express.dashboard');
    Route::get('express/update/profile', [ExpressAuthController::class, 'updateProfile'])->name('express.update.profile');
    Route::post('express/update/profile', [ExpressAuthController::class, 'updateProfilePost'])->name('express.update.profile');
    Route::get('express/logout', [ExpressAuthController::class, 'logout'])->name('express.logout');

    // student Data
    Route::get('express/student_data', [StudentDataController::class, 'studentData'])->name('express.student_data');
    Route::get('express/search', [StudentSearchController::class, 'search'])->name('express.search');
    Route::get('express/reportOne/{id}', [StudentSearchController::class, 'reportOne'])->name('express.reportOne');
    Route::get('express/reportTwo/{id}', [StudentSearchController::class, 'reportTwo'])->name('express.reportTwo');
    Route::get('express/quaterly/report', [StudentSearchController::class, 'quaterlyReport'])->name('express.quaterly.report');
    Route::get('express/summery/report', [StudentDataController::class, 'summeryReport'])->name('express.summery.report');


    Route::get('express/info', [StudentDataController::class, 'expressInfo'])->name('express.info');
});
