<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
Route::prefix('/admin')->middleware(\App\Http\Middleware\AdminAuthencate::class)->group(function (){
    Route::prefix('/user')->group(function (){
        Route::get('/',[UserController::class,'list'])->name('admin.user.list');
        Route::post('/add',[UserController::class,'add'])->name('admin.user.add');
        Route::post('/edit',[UserController::class,'edit'])->name('admin.user.edit');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
    });
    Route::prefix('/category')->group(function (){
        Route::get('/',[CategoryController::class,'list'])->name('admin.category.list');
        Route::post('/add',[CategoryController::class,'add'])->name('admin.category.add');
        Route::post('/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });
    Route::prefix('/food')->group(function (){
        Route::get('/',[FoodController::class, 'list'])->name('admin.food.list');
        Route::get('/add', [FoodController::class, 'doAdd'])->name('admin.food.doAdd');
        Route::post('/add',[FoodController::class,'add'])->name('admin.food.add');
        Route::get('/edit/{id}',[FoodController::class,'doEdit'])->name('admin.food.doEdit');
        Route::post('/edit',[FoodController::class, 'edit'])->name('admin.food.edit');
        Route::get('/delete/{id}', [FoodController::class,'delete'])->name('admin.food.delete');
    });
    Route::prefix('/order')->group(function (){
        Route::get('/order',[OrderController::class,'list'])->name('admin.order.list');
    });
});
Route::get('login', [LoginController::class,'viewLogin'])->name('view.login');
Route::post('login',[LoginController::class,'doLogin'])->name('admin.login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
?>