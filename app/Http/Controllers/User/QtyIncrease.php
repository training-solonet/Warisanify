<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QtyIncrease extends Controller
{
    public function increaseQty($id){

        $product = Cart::where('user_id', Auth::id())->where('id', $id)->get();
        $qty = $product[0]->qty + 1;
        Cart::where('user_id', Auth::id())->where('id', $id)->update([
            'qty' => $qty
        ]);

        return response()->json(['succes' => true]);
    }
}
