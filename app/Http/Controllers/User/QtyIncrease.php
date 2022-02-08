<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

class QtyIncrease extends Controller
{
    public function increaseQty($id){

        $product = Cart::find($id);
        $qty = $product->qty + 1;
        Cart::find($id)->update([
            'qty' => $qty
        ]);

        return Response()->json(['status' => true]);
    }
}
