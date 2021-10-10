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

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
Route::post('/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
Route::get('/profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('password');
Route::post('/profile/update_password/{id}', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('update_password');