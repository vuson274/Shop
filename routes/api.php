<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\HeartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/search',[HomeController::class,'search'])->name('search');
Route::post('/add-cart',[CartController::class,'addToCard'])->name('api.cart.add');
Route::get('/shop-cart',[CartController::class,'cart'])->name('shop-cart');
Route::get('/delete',[CartController::class,'deleteItemCart'])->name('api.cart.delete');
Route::get('/update',[CartController::class,'update'])->name('api.cart.update');
Route::get('/heart',[HeartController::class,'addHeart'])->name('api.heart.add');
Route::get('/heart-delete',[HeartController::class,'deHeart'])->name('api.heart.delete');
