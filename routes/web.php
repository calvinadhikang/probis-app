<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterKaryawanController;
use App\Http\Controllers\MasterSupplierController;
use App\Http\Controllers\MasterKategoriController;
use App\Http\Controllers\MasterMerkController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\TransaksiReturController;
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
Route::post('/', [LoginController::class, "loginAttempt"]);

Route::get('/register', [LoginController::class, "registerPage"]);

Route::get('/home', [HomeController::class, "homePage"]);

// Master
Route::prefix('/master')->group(function() {

    //BARANG
    Route::prefix('/barang')->group(function() {
        Route::get('/', [MasterBarangController::class, "View"]);
        Route::get('/add', [MasterBarangController::class, "Add"]);
        Route::get('/detail', [MasterBarangController::class, "Detail"]);
    });

    //KARYAWAN
    Route::prefix('/karyawan')->group(function() {
        Route::get('/', [MasterKaryawanController::class, "ViewKaryawan"]);
        Route::get('/add', [MasterBarangController::class, "Addbarang"]);
        Route::get('/detail/{id}', [MasterKaryawanController::class, "DetailKaryawan"])->name('detailkaryawan');
        Route::get('/edit/{id}', [MasterKaryawanController::class, "ToEditKaryawan"])->name('editkaryawan');
        Route::post('/edit/{id}', [MasterKaryawanController::class, "EditKaryawan"])->name('editkaryawan');

        Route::get('/add', [MasterKaryawanController::class, "ToAddKaryawan"]);
        Route::post('/add', [MasterKaryawanController::class, "AddKaryawan"]);

    });

    //SUPPLIER
    Route::prefix('/supplier')->group(function() {
        Route::get('/', [MasterSupplierController::class, "ViewSupplier"]);
        Route::get('/add', [MasterSupplierController::class, "AddSupplier"]);

        Route::get('/edit', [MasterSupplierController::class, "EditSupplier"]);
        Route::get('/addbarang', [MasterSupplierController::class, "AddBarangSupplier"]);
        Route::get('/editbarang', [MasterSupplierController::class, "EditBarangSupplier"]);

        Route::get('/detail', [MasterSupplierController::class, "DetailSupplier"]);

    });
    //     Route::get('/', [MasterKaryawanController::class, "View"]);
    //     Route::get('/add', [MasterKaryawanController::class, "Add"]);
    // });

    //MERK
    Route::prefix('/merk')->group(function() {
        Route::get('/', [MasterMerkController::class, "View"]);
        Route::post('/add', [MasterMerkController::class, "Add"]);
    });

    //KATEGORI
    Route::prefix('/kategori')->group(function() {
        Route::get('/', [MasterKategoriController::class, "View"]);
        Route::post('/add', [MasterKategoriController::class, "Add"]);
        Route::post('/toggle', [MasterKategoriController::class, "Toggle"]);
    });

});

Route::prefix('/transaksi')->group(function() {
    // Penjualan
    Route::prefix('/penjualan')->group(function() {
        Route::get('/', [TransaksiPenjualanController::class, "view"]);
        Route::get('/add', [TransaksiPenjualanController::class, "add"]);
    });

    // Retur
    Route::prefix('/retur')->group(function() {
        Route::get('/', [TransaksiReturController::class, "view"]);
        Route::get('/add', [TransaksiReturController::class, "add"]);
    });
});
