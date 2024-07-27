<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/',                     [HomeController::class, 'index']);
Route::get('/home',                 [HomeController::class, 'index'])->name('home');


Route::get('/product/{slug}',       [ProductController::class, 'detail'])->name('product.detail');

Route::get('/shop',                 [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');


Route::get('/check-out',            [App\Http\Controllers\HomeController::class, 'check_out'])->name('check-out');
Route::get('/contact',              [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('cart/list',             [CartController::class, 'list'])->name('cart.list');
Route::post('cart/add',             [CartController::class, 'add'])->name('cart.add');
Route::delete('cart/remove/{id}',   [CartController::class, 'remove'])->name('cart.remove');

Route::get('order/check-out',        [OrderController::class, 'index'])->name('order.check-out');
Route::post('order/save',           [OrderController::class, 'save'])->name('order.save');

