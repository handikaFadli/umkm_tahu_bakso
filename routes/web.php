<?php

use App\Models\GambarProduk;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Produk\EditProduk;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\AboutAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GambarProdukController;

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
//     return view('home');
// });

Route::get('/', [HomeAdminController::class, 'index']);
Route::get('/about', [AboutAdminController::class, 'index']);
Route::get('/shop', [ShopAdminController::class, 'index']);
Route::get('/shop/detail/{produk:kd_produk}', [ShopAdminController::class, 'show']);

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('reseller', ResellerController::class);
    Route::get('/print_reseller', [ResellerController::class, 'print'])->name('print_reseller');
    Route::resource('GambarProduk', GambarProdukController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::get('/print_penjualan', [PenjualanController::class, 'print'])->name('print_penjualan');
    Route::post('logout', LoginController::class)->name('logout');
});

Route::middleware('guest')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'loginStore'])->name('login');
});
