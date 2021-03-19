<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, 'home']);
Route::get("home", [HomeController::class, 'home']);
Route::get("about", [HomeController::class, 'home']);
Route::get("contact_us", [HomeController::class, 'home']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get("writer/orders/available", [WriterController::class, 'available']);

});

Route::middleware(['auth:sanctum', 'verified','is_not_admin'])->group(function () {
    Route::get('dashboard', [WriterController::class, 'dashboard']);
    Route::get("writer/orders/available", [WriterController::class, 'available']);
    Route::get("writer/order/{order_id}", [WriterController::class, 'single_order']);
});
Route::middleware(['auth:sanctum', 'verified','is_admin'])->group(function () {
    Route::get("admin", [AdminController::class, 'home'])->middleware('is_admin');
    Route::resource('sources', '\App\Http\Controllers\SourceController');
    Route::resource('orders', '\App\Http\Controllers\OrderController');
    Route::post('order_files/{random}',  [OrderController::class, 'add_files']);

});



Route::get('/login',function(){
    return redirect('/');
})->name('login');
