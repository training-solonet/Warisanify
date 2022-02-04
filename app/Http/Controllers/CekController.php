<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CekController extends Controller
{
    // public function index(){

    //     // $key = config('services.rajaongkir.key', '8ae7e24abf0fa4a5baba06ed12a408db');

    //     $response = Http::withHeaders([
    //         'key' => "8ae7e24abf0fa4a5baba06ed12a408db"
    //     ])->get('https://api.rajaongkir.com/starter/province');

    //     $data = json_decode($response, true);

    //     return $data;
    // }
    public function index(){

        // return $request->ongkir;
        $product = Cart::with('product')->where('user_id', Auth::id())->get();
        $subtotal = 0;
        foreach($product as $p){
            $subtotal += $p->qty * $p->product->regular_price;
        }
        return $product;
    }
}
