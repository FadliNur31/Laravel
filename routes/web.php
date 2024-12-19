<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;


Route::get('/', function () {
    return view('welcome');
});

 
Route::resource('/home/products', ProductsController::class)->middleware(['auth', 'verified']);
Route::resource('/home/admin', AdminController::class)->middleware('isAdmin');
Route::resource('/home/category', CategoryController::class)->middleware('isAdmin');
Route::resource('/home/user', UserController::class)->middleware('isAdmin');
Route::resource('/home/cart', CartController::class)->middleware(['auth', 'verified']);

Route::get('/home', function () {
    $userId = Auth::id(); 
    $cart = cart::where('user_id', $userId)->first(); 
    $cartItems = $cart->items()->with('product')->get();
    
    $products = Product::take(4)->get();

    return view('home', compact('products', 'cartItems'));
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
