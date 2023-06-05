<?php
namespace App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('product', [Productcontroller::class, 'index']);
Route::get('product/get', [Productcontroller::class, 'getproduct'])->name('get.product');
Route::get('form', [Productcontroller::class, 'form']);
Route::post('form', [Productcontroller::class, 'store']);
//Route::put('product/{product}', [productController::class, 'update'])->name('product.update');
//Route::get('product/{product}/edit', [productController::class, 'edit']);

Route::get('product/edit/{product}', [Productcontroller::class, 'edit']);
Route::put('product/{product}', [Productcontroller::class, 'update'])->name('products.update');


// Route::post('product/delete/{product}', [productController::class, 'delete'])->name('delete');
Route::post('products/delete/{id}', [Productcontroller::class,'delete'])->name('products.delete');



Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload', [ContactController::class,'upload']);
Route::get('/login', function () {})->name('login');
Route::get('/register', function () {})->name('register');

Route::get('product/{id}',[ProductController::class,'show']);
