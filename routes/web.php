<?php

use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    //



//Products
// Route::get('/',[ProductController::class,'dashboard'])->name('dashboard');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('store');
Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');
Route::get('/datails/{id}',[ProductController::class,'detail'])->name('detail');


//Orders

Route::get('/orders/index',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/confirm/{id}',[OrderController::class,'confirm'])->name('orders.confirm');
Route::get('/orders/pending/{id}',[OrderController::class,'pending'])->name('orders.pending');
Route::get('/orders/details/{id}',[OrderController::class,'details'])->name('orders.details');


//users
Route::get('/users/index',[UserController::class,'index'])->name('users.index');
Route::get('/users/details/{id}',[UserController::class,'details'])->name('users.details');
Route::get('/profile',[UserController::class,'profile'])->name('admin.profile');
Route::post('/profile/store',[UserController::class,'profile_store'])->name('admin.profile.store');


});

//front
Route::get('/',[HomeController::class,'index'])->name('front.index');


//Cart

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');


//login
Route::get('/user/login',[LoginController::class,'login'])->name('user.login.index');
Route::get('/user/login/store',[LoginController::class,'store'])->name('login.store');
Route::get('/user/profile',[LoginController::class,'profile'])->name('profile.index');

//register
Route::get('/user/register',[RegisterController::class,'register'])->name('user.register.index');
Route::post('/user/register/store',[RegisterController::class,'store'])->name('register.store');



