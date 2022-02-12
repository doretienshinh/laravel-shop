<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class,'store']);

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function (){
        Route::get('/', [MainController::class,'index'])->name('admin');

        #Menu
        Route::prefix('menus')->group(function (){
            Route::get('add', [MenuController::class, 'create'])->name('admin.menus.add');
            Route::post('add', [MenuController::class, 'store'])->name('admin.menus.store');
            Route::get('list', [MenuController::class, 'index'])->name('admin.menus.list');
            Route::get('edit/{menu}', [MenuController::class, 'show'])->name('admin.menus.show');
            Route::post('edit/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
            Route::DELETE('destroy', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
        });

        #Product
        Route::prefix('products')->group(function(){
            Route::get('add', [ProductController::class, 'create'])->name('admin.products.add');
            Route::post('add', [ProductController::class, 'store'])->name('admin.products.store');
            Route::get('list', [ProductController::class, 'index'])->name('admin.products.list');
            Route::get('edit/{product}', [ProductController::class, 'show'])->name('admin.products.show');
            Route::post('edit/{product}', [ProductController::class, 'update'])->name('admin.products.update');
            Route::DELETE('destroy', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store'])->name('admin.upload');
    });

});

