<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\UserController;
    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\ProductController;
    Route::prefix('/admin')->group(function (){
        Route::prefix('/user')->group(function (){
            Route::get('/',[AdminController::class, 'list'])->name('admin.user.list');
            Route::post('/add',[AdminController::class,'add'])->name('admin.user.add');
            Route::post('/edit',[AdminController::class, 'edit'])->name('admin.user.edit');
            Route::get('/delete/{id}', [AdminController::class,'delete'])->name('admin.user.delete');
        });
        Route::prefix('/category')->group(function (){
            Route::get('/',[CategoryController::class, 'list'])->name('admin.category.list');
            Route::post('/add',[CategoryController::class,'add'])->name('admin.category.add');
            Route::post('/edit',[CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::get('/delete/{id}', [CategoryController::class,'delete'])->name('admin.category.delete');
        });
        Route::prefix('/product')->group(function (){
            Route::get('/',[ProductController::class, 'list'])->name('admin.product.list');
            Route::get('/add', [ProductController::class, 'doAdd'])->name('admin.product.doAdd');
            Route::post('/add',[ProductController::class,'add'])->name('admin.product.add');
            Route::post('/edit',[ProductController::class, 'edit'])->name('admin.product.edit');
            Route::get('/delete/{id}', [ProductController::class,'delete'])->name('admin.product.delete');
        });
    });
?>