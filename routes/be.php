<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\UserController;
    Route::prefix('/admin')->group(function (){
        Route::prefix('/user')->group(function (){
            Route::get('/',[UserController::class, 'list'])->name('admin.user.list');
        });
    });
?>