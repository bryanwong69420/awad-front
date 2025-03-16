<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/product', [UserController::class, 'showProduct'])->name('product');
Route::get('/product/samsung', [ProductController::class, 'showSamsung'])->name('samsung');
Route::get('/product/lg', [ProductController::class, 'showLG'])->name('lg');
