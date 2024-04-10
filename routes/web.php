<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::patch('/profiles/{profile}/status', [ProfileController::class, 'status'])->name('profiles.status');
Route::resource('/profiles', ProfileController::class);
