<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Models\Shop;
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
    $shop = Shop::where('public', true)->with('products')->first();
    
    return view('app', compact('shop'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::put('/profile/{profile}/picture', [ProfileController::class, 'updatePicture'])->middleware(['auth']);
Route::get('/cart', [CartController::class, 'index'])->middleware(['auth']);
Route::get('/cart/confirm', [CartController::class, 'confirm'])->middleware(['auth']);
Route::delete('/cart/{id}', [CartController::class, 'remove'])->middleware(['auth']);
Route::post('/cart/{id}', [CartController::class, 'add'])->middleware(['auth']);

Route::resource('order', OrderController::class)->middleware(['auth']);
Route::resource('profile', ProfileController::class)->middleware(['auth']);
Route::resource('shop', ShopController::class)->middleware(['auth']);
Route::resource('product', ProductController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
