<?php

use App\Http\Controllers\Admin\CategoryController;
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
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\FinishPaymentController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\CheckoutController as CheckouttController;
use App\Http\Controllers\Admin\DetailCheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\QtyUpdateController;
use App\Models\Checkout;

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

Route::get('/cek', [CekController::class, 'index']);

Route::get('/', function () {
    if (Auth::user()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.product.index');
        } else if (Auth::user()->role == 'user') {
            return view('user.home');
        } else {
            return view('user.home');
        }
    } else {
        return view('user.home');
    }
    return view('user.home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('checkoutAdmin', CheckouttController::class);
    Route::resource('checkoutDetails', DetailCheckoutController::class);
});

Route::resource('home', DashboardController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::resource('cart', CartController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::get('/qty-increase/{id}', [QtyIncrease::class, 'increaseQty']);
    Route::get('/qty-decrease/{id}', [QtyDecrease::class, 'decreaseQty']);
    Route::resource('payment', PaymentController::class);
    Route::resource('midtrans/finish', FinishPaymentController::class);


    Route::get('get-province', [CheckoutController::class, 'get_province'])->name('get-province');
    //get city raja ongkir
    Route::get('get-city', [CheckoutController::class, 'get_city'])->name('get-city');
    //get cost raja ongkir
    Route::get('get-cost', [CheckoutController::class, 'get_cost'])->name('get-cost');
});

Route::get('profil', [function () {
    return view('user.profil');
}]);

Route::get('theater', [function () {
    return view('user.theater');
}]);

Route::get('about', [function () {
    return view('user.about');
}]);

//default jetstream
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/cek-api', [CekController::class, 'index']);
