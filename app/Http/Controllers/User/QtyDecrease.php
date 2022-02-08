<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QtyDecrease extends Controller
{
    public function decreaseQty($id){

        $product = Cart::find($id);
        $qty = $product->qty - 1;
        Cart::find($id)->update([
            'qty' => $qty
        ]);
        
        return Response()->json(['status' => true]);
    }
}
