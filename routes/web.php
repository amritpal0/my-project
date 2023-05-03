<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class, 'home']);

Auth::routes();


Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('home');

    // upldate user image
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/setting', [AdminController::class, 'upload_image'])->name('upload');


    // update sliders
    Route::get('/slider', [AdminController::class, 'slider'])->name('slider.create');
    Route::post('/slider', [AdminController::class, 'update_slider'])->name('slider.update');
    Route::post('/slider-delete', [AdminController::class, 'delete_slider'])->name('slider.delete');
});

