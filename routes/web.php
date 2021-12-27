<?php


use App\Models\Barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;


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


Route::get('/shop', function(){
    $barang = Barang::with('kategori')->get();
    return view('shop', compact('barang'));
});

Route::resource('/barang', BarangController::class);

Route::resource('/kategori', KategoriController::class);

//master

Route::get('/regist', function () {
    return view('regist');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('redirects', [homeController::class, 'index']);

    // Route::middleware(['onlyAdmin'])->group(function () {
    //     Route::get('admin', function () {
    //         return view('index');
    //     });

    // });

    Route::group(['prefix' => 'redirects', 'middleware' => 'onlyAdmin'], function () {
        Route::get('admin', function () {
            return view('index');
        });
        Route::get('kategori', function () {
            return view('kategori');
        });
    });
});

// Route::group(['prefix'=>'accounts','as'=>'account.'], function(){
//     Route::get('/', ['as' => 'index', 'uses' => 'AccountController@index']);
//     Route::get('connect', ['as' => 'connect', 'uses' = > 'AccountController@connect']);
// });
