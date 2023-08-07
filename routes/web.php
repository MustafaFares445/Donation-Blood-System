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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/home' , \App\Http\Controllers\HomeController::class);
Route::resource('/user' , \App\Http\Controllers\UserController::class);
Route::resource('/donation' , \App\Http\Controllers\BloodDonationController::class);
Route::resource('/donor' , \App\Http\Controllers\DonorsController::class);
Route::get('/request_donation/{request_donation}/approve' , [\App\Http\Controllers\RequestDonationController::class , 'approve'])->name('request_donation.approve')
Route::resource('/request_donation' , \App\Http\Controllers\RequestDonationController::class);
