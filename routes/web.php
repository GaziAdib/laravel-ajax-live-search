<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/create', [ProductController::class, 'createProduct'])->name('product.create');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/search', [ProductController::class, 'search'])->name('product.search');

Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/udpate/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

