<?php


use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\KeranjangController;


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

Route::get('/', function () {
    return view('index');
});

// Route::get('/shop', function () {
//     $barang = Barang::with('kategori')->get();
//     return view('shop', compact('barang'));
// });

Route::get('/shop', [shopController::class, 'index'])->name('shop');


Route::resource('/barang', BarangController::class);

Route::resource('/kategori', KategoriController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('add-to-cart', KeranjangController::class);
});

// Route::get('/modal', function () {
//     return view('adminPage.modal.createModal');
// });

// Route::get('/regist', function () {
//     return view('regist');
// });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('redirects', [homeController::class, 'index']);

    Route::group(['prefix' => 'admin', 'middleware' => 'onlyAdmin'], function () {

        Route::resource('/barang', BarangController::class);

        Route::resource('/kategori', KategoriController::class);
    });
});
