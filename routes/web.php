<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CekController;
use App\Http\Controllers\CekController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\QtyDecrease;
// use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\QtyIncrease;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\QtyUpdateController;


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
    if(Auth::user()){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.product.index');
        } else if(Auth::user()->role == 'user'){
            return view('user.home');
        } else {
            return view('user.home');
        }
    } else {
        return view('user.home');
    }
    return view('user.home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('product', ProductController::class);
});

Route::resource('home', DashboardController::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::resource('cart', CartController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::get('/qty-increase/{id}', [QtyIncrease::class, 'increaseQty']);
    Route::get('/qty-decrease/{id}', [QtyDecrease::class, 'decreaseQty']);

    Route::get('get-province', [CheckoutController::class, 'get_province'])->name('get-province');
    //get city raja ongkir
    Route::get('get-city', [CheckoutController::class, 'get_city'])->name('get-city');
    //get cost raja ongkir
    Route::get('get-cost', [CheckoutController::class, 'get_cost'])->name('get-cost');
});

//default jetstream
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/cek-api', [CekController::class, 'index']);