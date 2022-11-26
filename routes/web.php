<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
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
        Route::get('/add', [MasterBarangController::class, "GoAdd"]);
        Route::post('/add', [MasterBarangController::class, "Add"]);
        Route::get('/detail/{id}', [MasterBarangController::class, "formDetail"])->name('detailBarang');
        Route::get('/edit/{id}', [MasterBarangController::class, "formEdit"])->name('editBarang');
        Route::post('/edit/{id}', [MasterBarangController::class, "edit"])->name('editBarang');

    });
    Route::prefix('/karyawan')->group(function() {
        Route::get('/', [MasterKaryawanController::class, "ViewKaryawan"]);
        // Route::get('/add', [MasterBarangController::class, "Addbarang"]);
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
        Route::get('/edit/{id}', [MasterSupplierController::class, "EditSupplier"]);
        Route::get('/editbarang', [MasterSupplierController::class, "EditBarangSupplier"]);
        Route::get('/detail/{id}', [MasterSupplierController::class, "DetailSupplier"]);


        Route::post('/add', [MasterSupplierController::class, 'add']);
        Route::post('/edit/{id}', [MasterSupplierController::class, "edit"]);
        Route::post('/addBarang/{id}', [MasterSupplierController::class, "AddBarangSupplier"]);
        Route::post('/removeBarang/{id}', [MasterSupplierController::class, "RemoveBarangSupplier"]);
    });
    //     Route::get('/', [MasterKaryawanController::class, "View"]);
    //     Route::get('/add', [MasterKaryawanController::class, "Add"]);
    // });

    //MERK
    Route::prefix('/merk')->group(function() {
        Route::get('/', [MasterMerkController::class, "View"]);
        Route::post('/add', [MasterMerkController::class, "Add"]);
        Route::post('/toggle', [MasterMerkController::class, "Toggle"]);
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
        Route::post('/add', [TransaksiPenjualanController::class, "AddAction"]);
        Route::get('/tambah/{id}', [TransaksiPenjualanController::class, "tambah"]);
        Route::get('/kurang/{id}', [TransaksiPenjualanController::class, "kurang"]);
        Route::post('/checkout', [TransaksiPenjualanController::class, "checkout"]);
        Route::get('/detail/{id}', [TransaksiPenjualanController::class, "detail"]);
    });

    // Retur
    Route::prefix('/retur')->group(function() {
        Route::get('/', [TransaksiReturController::class, "view"]);
        Route::get('/add', [TransaksiReturController::class, "add"]);
    });
});

Route::prefix('/laporan')->group(function(){
    Route::get('/', [LaporanController::class, 'view']);
    Route::post('/create', [LaporanController::class, 'create']);
});

Route::get('/test', function(){
    return view('partials.components.sidebar');
});

// AJAX ROUTE
Route::get('/getBarang', [MasterBarangController::class, 'getBarangJSON']);
Route::get('/getKategori', [MasterKategoriController::class, 'getKategoriJSON']);
Route::get('/penjualanPerBulan', [TransaksiPenjualanController::class, 'getPenjualanPerBulan']);
Route::get('/barang/top5', [TransaksiPenjualanController::class, 'top5Barang']);
