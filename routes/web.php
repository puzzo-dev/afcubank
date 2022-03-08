<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountscontroller;
use App\Http\Controllers\userscontroller;
use App\Http\Controllers\txnscontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\recipientController;
use App\Http\Controllers\kycController;
use App\Http\Controllers\otpController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\sitesettingsController;

// use

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
    return view('mainweb.welcome');
});

Route::get('/loans', function () {
    return view('users.loans');
})->name('loans');

// Route::resource('/admin', userscontroller::class);
Auth::routes(['verify' => true]);
Route::resource('/txns', txnscontroller::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/accusers', userscontroller::class);
Route::resource('/account', accountscontroller::class);
Route::resource('/beneficiaries', recipientController::class);
Route::resource('/kyc', kycController::class);
Route::resource('/otp', otpController::class);
Route::resource('/notifications', notificationController::class);
Route::resource('/admin', adminController::class);
Route::resource('/settings', sitesettingsController::class);
