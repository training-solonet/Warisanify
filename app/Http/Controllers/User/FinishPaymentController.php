<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Mail\SendEmail;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\SuccessCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FinishPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = Cart::with('product.category:id,name')->where('user_id', Auth::id())->get();
        // $cartQty = Cart::select('id', 'qty')->get();
        // return $cart[0]->product->regular_price;
        $checkout = Checkout::select('id')->where('id', Auth::id())->get();
        // return $cart[0]->product->id;

        // foreach ($cart as $data) {
        //     return $data->product->id;
        // }
        SuccessCheckout::create([
            'checkout_id' => $checkout[0]->id,
            'product_id' => $cart[0]->product->id,
            'qty' => $cart[0]->qty,
            'price_per_item' => $cart[0]->product->regular_price
        ]);

        $cek = SuccessCheckout::get();

        return $cek;

        // return $cart->product->id;
        // Mail::to('edy.kurniawan@fikom.udb.ac.id')->send(new SendEmail);
        Cart::where('user_id', Auth::id())->delete();

        return 'Berhasil kirim email';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
