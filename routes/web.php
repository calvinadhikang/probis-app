<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterKaryawanController;
use App\Http\Controllers\MasterSupplierController;
use App\Http\Controllers\MasterKategoriController;
use App\Http\Controllers\MasterMerkController;

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
        Route::get('/', [MasterBarangController::class, "View"]);
        Route::get('/add', [MasterBarangController::class, "Add"]);
    });

    //KARYAWAN
    Route::prefix('/karyawan')->group(function() {
        Route::get('/', [MasterKaryawanController::class, "ViewKaryawan"]);
        Route::get('/add', [MasterKaryawanController::class, "AddKaryawan"]);
    });

    Route::prefix('/supplier')->group(function() {
        Route::get('/', [MasterSupplierController::class, "ViewSupplier"]);
        Route::get('/add', [MasterSupplierController::class, "AddSupplier"]);
        Route::get('/edit', [MasterSupplierController::class, "EditSupplier"]);
        Route::get('/addbarang', [MasterSupplierController::class, "AddBarangSupplier"]);
        Route::get('/editbarang', [MasterSupplierController::class, "EditBarangSupplier"]);
    });
    //     Route::get('/', [MasterKaryawanController::class, "View"]);
    //     Route::get('/add', [MasterKaryawanController::class, "Add"]);
    // });

    //MERK
    Route::prefix('/merk')->group(function() {
        Route::get('/', [MasterMerkController::class, "View"]);
        Route::get('/add', [MasterMerkController::class, "Add"]);
    });

    //KATEGORI
    Route::prefix('/kategori')->group(function() {
        Route::get('/', [MasterKategoriController::class, "View"]);
        Route::get('/add', [MasterKategoriController::class, "Add"]);
    });

});

// Penjualan
Route::get('/penjualan', [HomeController::class, "penjualanPage"]);
