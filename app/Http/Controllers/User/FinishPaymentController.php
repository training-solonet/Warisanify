<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Mail\SendEmail;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\SuccessCheckout;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class FinishPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return $data;
        // return $cartId;

        // while ($cartt = $cart) {
        //     $cartNew[] = $cartt;
        //     // return $cartNew;
        // }

        // return $cart;
        // for ($i = 0; $i > 2; $i++) {
        //     $cartNew[] = $cart[$i];
        //     return $cartNew;
        // }


        // return $cartNew;

        // return $cart[0]->product->id;

        // // foreach ($cart as $data) {
        // //     return $data->product->id;
        // // }

        // SuccessCheckout::create([
        //     'checkout_id' => $checkout->id,
        //     'product_id' => $cart->product_id,
        //     'qty' => $cart->qty,
        //     'price_per_item' => $cart->product->regular_price
        // ]);

        // SuccessCheckout::all();

        // return $cek;

        // return $cart->product->id;
        // Checkout::where('sell_code', )->update([
        //     'status' => 'success',
        // ]);
        // Mail::to('edy.kurniawan@fikom.udb.ac.id')->send(new SendEmail);
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('home.index');
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
