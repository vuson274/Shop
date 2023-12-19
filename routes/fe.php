<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\OrderController;
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/product/{id}',[HomeController::class,'product'])->name('product');
    Route::get('/shop',[HomeController::class,'shop'])->name('shop');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/signin',[HomeController::class,'signin'])->name('signin');
    Route::get('/signup',[HomeController::class,'signup'])->name('signup');
    Route::post('/signup',[AuthController::class,'register'])->name('register');
    Route::get('/check-out',[OrderController::class,'ckeckOut'])->name('check-out');
    Route::post('/login',[AuthController::class,'loginUser'])->name('login-user');
    Route::get('/logout',[AuthController::class,'logoutUser'])->name('logout-user');
    Route::middleware('user')->post('/order',[OrderController::class,'makeOrder'])->name('order');
?>