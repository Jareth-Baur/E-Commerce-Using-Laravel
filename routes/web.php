<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OfficeController; // Added OfficeController import
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

// Dashboard route, accessible only by authenticated and verified users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes (edit, update, destroy)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product routes: list all products and list by product code
    Route::get('/products', [ProductController::class, 'list'])->name('productlist');
    Route::get('/product/{code}', [ProductController::class, 'details']);

    // User route: list all users
    Route::get('/user', [UserController::class, 'list'])->name('userlist');

    // Employee route: list all employees
    Route::get('/employees', [EmployeeController::class, 'list'])->name('emplist');
    Route::get('/employee/{code}', [EmployeeController::class, 'details']);

    // Customer routes: list all customers and list customer by ID
    Route::get('/customers', [CustomerController::class, 'list'])->name('customerlist');
    Route::get('/customer/{code}', [CustomerController::class, 'details']);
    Route::get('/customer/{customerNumber}/orders', [CustomerController::class, 'viewOrders'])->name('customer.orders');

    // Order route: list all orders
    Route::get('/orders', [OrderController::class, 'list'])->name('orderlist');

    // Office route: list all offices
    Route::get('/offices', [OfficeController::class, 'list'])->name('officelist');
});

require __DIR__ . '/auth.php';
