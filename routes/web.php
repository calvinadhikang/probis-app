<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterBarangController;
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

// Master
Route::prefix('/master')->group(function() {

    //BARANG
    Route::prefix('/barang')->group(function() {
        Route::get('/', [MasterBarangController::class, "ViewBarang"]);
        Route::get('/add', [MasterBarangController::class, "Addbarang"]);
    });

    //KARYAWAN
    Route::prefix('/karyawan')->group(function() {
        Route::get('/', [MasterBarangController::class, "ViewBarang"]);
        Route::get('/add', [MasterBarangController::class, "Addbarang"]);
    });

    // ivander coba
    // ini coba dulu
    // ibw
    // coba laptop
});

// Penjualan
Route::get('/penjualan', [HomeController::class, "penjualanPage"]);
