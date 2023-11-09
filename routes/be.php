<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\UserController;
    use App\Http\Controllers\Admin\AdminController;
    Route::prefix('/admin')->group(function (){
        Route::prefix('/user')->group(function (){
            Route::get('/',[AdminController::class, 'list'])->name('admin.user.list');
            Route::post('/add',[AdminController::class,'add'])->name('admin.user.add');
        });
    });
?>