<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultiUserController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PetugasController;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [MultiUserController::class, 'index'])->name('multi-user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/barang/show', [BarangController::class, 'show'])->name('barang-show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::post('/petugas/tambah', [PetugasController::class, 'store'])->name('petugas-tambah');
    Route::post('/petugas/{id}/update', [PetugasController::class, 'update'])->name('petugas-update');
    Route::post('/petugas/{id}/destroy', [PetugasController::class, 'destroy'])->name('petugas-destroy');
    Route::get('/export', [PetugasController::class, 'export'])->name('export');

    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::post('/barang/tambah', [BarangController::class, 'store'])->name('barang-tambah');
    Route::post('/barang/{id}/update', [BarangController::class, 'update'])->name('barang-update');
    Route::post('/barang/{id}/destroy', [BarangController::class, 'destroy'])->name('barang-destroy');
    Route::get('/export', [BarangController::class, 'export'])->name('export');

    Route::get('/transaksi', [CashController::class, 'index'])->name('transaksi');
    Route::post('/transaksi/tambah', [CashController::class, 'store'])->name('transaksi-tambah');
    Route::post('/transaksi/{id}/update', [CashController::class, 'update'])->name('transaksi-update');
    Route::post('/transaksi/{id}/destroy', [CashController::class, 'destroy'])->name('transaksi-destroy');

    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::post('/pengeluaran/tambah', [PengeluaranController::class, 'store'])->name('pengeluaran-tambah');
    Route::post('/pengeluaran/{id}/destroy', [PengeluaranController::class, 'destroy'])->name('pengeluaran-destroy');

    Route::get('/ambil-harga', [CashController::class, 'ambilHarga'])->name('ambil.harga');

    // Route::get('/tax',[CashController::class, 'tax'])->name('tax');
    // Route::post('/cash/tambah', [CashController::class. 'store'])->name('cash-tambah');



    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});
