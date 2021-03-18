<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, 'home']);
Route::get("home", [HomeController::class, 'home']);
Route::get("about", [HomeController::class, 'home']);
Route::get("contact_us", [HomeController::class, 'home']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get("contact_us", [HomeController::class, 'home']);
