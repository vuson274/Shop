<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/category/{id}',[HomeController::class,'getFood'])->name('get.food');
Route::post('/order',[HomeController::class,'order'])->name('order');