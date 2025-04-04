<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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


/*Product*/
Route::get('/product', [UserController::class, 'showProduct'])->name('product');
Route::get('/product/samsung', [ProductController::class, 'showSamsung'])->name('samsung');
Route::get('/product/lg', [ProductController::class, 'showLG'])->name('lg');

/*Register*/
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register/submit', [UserController::class,'submitUserRegistration'])->name('submitUserRegistration');

/*Login*/
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('');

/*Contact*/
Route::get('/contact',[ContactController::class, 'showContact'])->name('contact');

/*Admin Dashboard*/
Route::get('/admin', [AdminController::class, 'showDashboard'])->name('admin');
Route::get('/adminFeedback', [AdminController::class, 'feedbackList'])->name('adminFeedback');
Route::get('/adminFeedbackView', [AdminController::class, 'viewFeedback'])->name('adminFeedbackView');
Route::get('/adminProductView', [AdminController::class, 'showSelectedProducts'])->name('adminProductView');
Route::get('/adminAddProduct', [AdminController::class, 'storeProduct'])->name('adminAddProduct');
Route::get('/adminAddProduct', [AdminController::class, 'showAddProductPage'])->name('adminAddProduct');