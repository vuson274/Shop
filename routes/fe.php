<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/product/{id}',[HomeController::class,'product'])->name('product');
    Route::get('/shop',[HomeController::class,'shop'])->name('shop');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/signin',[HomeController::class,'signin'])->name('signin');
    Route::get('/signup',[HomeController::class,'signup'])->name('signup');
?>