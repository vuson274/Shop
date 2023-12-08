<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\CartController;

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
Route::post('/add-cart',[CartController::class,'addItemToCart'])->name('api.cart.add');
Route::get('/shop-cart',[CartController::class,'shopCart'])->name('shop-cart');
Route::get('/delete',[CartController::class,'delete'])->name('api.cart.delete');
