<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/regist', function () {
    return view('regist');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('redirects', [homeController::class, 'index']);
Route::post('redirects', [homeController::class, 'authenticate']);

