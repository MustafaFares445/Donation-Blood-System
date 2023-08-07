<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::group(['middleware' => 'can:isAdmin' ] , function (){
    Route::resource('/donor' , \App\Http\Controllers\DonorsController::class);
    Route::resource('/home' , \App\Http\Controllers\HomeController::class);
    Route::resource('/user' , \App\Http\Controllers\UserController::class);
    Route::get('/request_donation/{request_donation}/approve' , [\App\Http\Controllers\RequestDonationController::class , 'approve'])->name('request_donation.approve');
    Route::resource('/request_donation' , \App\Http\Controllers\RequestDonationController::class)->except('store');
    Route::resource('/feedback' , \App\Http\Controllers\FeedbackController::class)->only('index');
    Route::resource('/donation' , \App\Http\Controllers\BloodDonationController::class)->except(  'create' );
});

Route::group(['middleware' => 'check_user_details' , 'can:isUser' ] , function (){
    Route::resource('/home' , \App\Http\Controllers\user\HomeController::class);
    Route::resource('/c' , \App\Http\Controllers\user\UserDetailsController::class);
    Route::resource('/feedback' , \App\Http\Controllers\FeedbackController::class)->only('create' , 'store');
    Route::resource('/request_donation' , \App\Http\Controllers\RequestDonationController::class)->only('store');
});

Route::resource('/donation' , \App\Http\Controllers\BloodDonationController::class)->only('index' , 'create' , 'show');

