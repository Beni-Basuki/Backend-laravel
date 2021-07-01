<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DatapesawatController;
use App\Http\Controllers\DatamobilController;
use App\Http\Controllers\DatakeretaapiController;



Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('pesawat1', [DatapesawatController::class, 'index'])->name('pesawat1');
    Route::get('mobil1', [DatamobilController::class, 'index'])->name('mobil1');
    Route::get('keretaapi1', [DatakeretaapiController::class, 'index'])->name('keretaapi1');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

Route::resource('pesawat', DatapesawatController::class);
Route::resource('mobil', DatamobilController::class);
Route::resource('keretaapi', DatakeretaapiController::class);


