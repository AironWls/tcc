<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

});



Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [LoginController::class, 'password_request'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'password_email'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'password_reset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'password_update'])->middleware('guest')->name('password.update');

Route::delete('/profiles/destroySelected', [ProfileController::class, 'destroySelected'])->name('profiles.destroySelected');
Route::patch('/profiles/{profile}/status', [ProfileController::class, 'status'])->name('profiles.status');
Route::resource('/profiles', ProfileController::class);

Route::patch('/roles/{role}/status', [RoleController::class, 'status'])->name('roles.status');
Route::resource('/roles', RoleController::class);

Route::patch('/users/{user}/status', [UserController::class, 'status'])->name('users.status');
Route::resource('/users', UserController::class);
