<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/prediction', [App\Http\Controllers\PredictionController::class, 'index'])->name('index');
Route::post('/prediction/filter', [App\Http\Controllers\PredictionController::class, 'filter'])->name('filter');

Route::get('/sales', [App\Http\Controllers\SalesController::class, 'index'])->name('index');
Route::post('/sales/import', [App\Http\Controllers\SalesController::class, 'import'])->name('import');
Route::get('/sales/export', [App\Http\Controllers\SalesController::class, 'export'])->name('export');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
Route::post('/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
Route::get('/profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('password');
Route::post('/profile/update_password/{id}', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('update_password');