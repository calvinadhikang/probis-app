<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, "loginPage"]);
Route::get('/register', [LoginController::class, "registerPage"]);
Route::post('/', [LoginController::class, "loginAttempt"]);

Route::get('/home', [HomeController::class, "homePage"]);

// Penjualan
Route::get('/penjualan', [HomeController::class, "penjualanPage"]);