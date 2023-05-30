<?php

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

Route::middleware('role:Admin')->group(function () {
    //roles
    Route::get('/admin/roles', [\App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles', [\App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/admin/roles/{role}/edit', [\App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/admin/roles/{role}', [\App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update');

    //users
    Route::get('/admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [\App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');

    //logs
    Route::get('/admin/logs', [ \App\Http\Controllers\LogController::class, 'index'])->name('admin.logs.index');
    Route::delete('/admin/logs/{log}', [ \App\Http\Controllers\LogController::class, 'destroy'])->name('admin.logs.destroy');

    //categories
    Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update');

    Route::get('/products/create', [ \App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ \App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ \App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ \App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{product}/remove', [ \App\Http\Controllers\ProductController::class, 'remove'])->name('products.remove');
});

Route::middleware('role:Admin|Client')->group(function () {
    Route::get('/products', [ \App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware('role:Client')->group(function () {
    Route::post('/cart/add-product-to-cart/{product}', \App\Http\Controllers\AddProductToCart::class)->name('app.add_product_to_cart');
    Route::get('/cart/show', \App\Http\Controllers\ShowCart::class)->name('cart.show');
});

Auth::routes();


