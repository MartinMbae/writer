<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SourceController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, 'home']);
Route::get("home", [HomeController::class, 'home']);
Route::get("about", [HomeController::class, 'home']);
Route::get("contact_us", [HomeController::class, 'home']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get("admin", [AdminController::class, 'home']);
Route::resource('sources', '\App\Http\Controllers\SourceController');
Route::resource('orders', '\App\Http\Controllers\OrderController');
Route::post('order_files/{random}',  [OrderController::class, 'add_files']);


Route::get('/login',function(){
    return redirect('/');
})->name('login');
