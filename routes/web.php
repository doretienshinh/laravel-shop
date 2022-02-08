<?php

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
            Route::get('list', [MenuController::class, 'index'])->name('admin.menus.index');
            Route::DELETE('destroy', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
        });
    });

});

