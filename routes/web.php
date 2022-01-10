<?php

use App\Http\Controllers\ProfileController;
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

Route::resource('profile', ProfileController::class)->middleware(['auth']);
require __DIR__ . '/auth.php';
