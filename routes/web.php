<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductController::class, 'list'])->name('productlist');
    Route::get('/product/{code}', [ProductController::class, 'listByCode']);
    Route::get('/user', [UserController::class, 'list'])->name('userlist');


    Route::get('/employees', [EmployeeController::class, 'list'])->name('emplist');



    Route::get('/customers', [CustomerController::class, 'index'])->name('customerlist');
    Route::get('/customer/{code}', [CustomerController::class, 'listAllCustomers']);

});

require __DIR__.'/auth.php';
