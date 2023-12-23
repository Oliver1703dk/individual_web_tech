<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// Products routes
Route::get('/products' , [ProductController::class, 'indexAPI'])->name('products');
Route::get('/products/{id}' , [ProductController::class, 'getProductsByIdAPI'])->name('getProductsById');

// Add product
Route::post('/addProductDB', [ProductController::class, 'addProductDBAPI'])->name('addProductDB');

// Delete product
// TODO: Maybe change this to delete HTTP method
Route::post('/deleteProduct/{id}' , [ProductController::class, 'deleteProductAPI'])->name('deleteProduct');


// Carts routes
Route::get('/cart/{userId}' , [CartController::class, 'getCartAPI'])->name('getCart');
Route::post('/addProductToCart/{userId}/{productId}' , [CartController::class, 'addProductToCartAPI'])->name('addProductToCartAPI');

Route::post('/minusQuantity/{userId}/{productId}' , [CartController::class, 'minusProductQuantityAPI'])->name('minusProductQuantityAPI');

Route::post('/checkoutPage/{userId}' , [PaymentController::class, 'checkoutPagePostAPI'])->name('checkoutPagePost');


// Add user
Route::post('/userReg' , [RegistrationController::class, 'userRegPostAPI'])->name('userReg');

// Login routes
Route::post('/login' , [AuthenticationController::class, 'loginPostAPI'])->name('loginPostAPI');

// Change password
Route::post('/changePassword' , [ProfileController::class, 'changePasswordAPI'])->name('changePassword');






