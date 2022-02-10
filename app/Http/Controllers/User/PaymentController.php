<?php

namespace App\Http\Controllers\User;

use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\SuccessCheckout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "is index";
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

        $ongkir = $request->service;
        $product = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        $subtotal = 0;
        foreach ($product as $p) {
            $subtotal += $p->qty * $p->product->regular_price;
        }

        $subtotal += $ongkir;

        $cart = Cart::with('Product')->where('user_id', Auth::id())->get();
        $sellcode = date('Y-m-d') . '-' . rand();
        // return $sellcode;
        foreach ($cart as $value) {
            $array = [
                'sell_code' => $sellcode,
                'product_id' => $value->product_id,
                'qty' => $value->qty,
                'price_per_item' => $value->product->regular_price
            ];

            $data[] = $array;
        }

        SuccessCheckout::insert($data);

        Checkout::create([
            'username' => Auth::user()->name,
            'telp' => $request->telp,
            'province' => $request->province,
            'city' => $request->city,
            'courier' => $request->courier,
            'cost' => $request->cost,
            'origin' => $request->origin,
            'sell_code' => "$sellcode"
        ]);

        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('midtrans.isSanitized');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $subtotal,
            ],
            'cutomer_details' => [
                'first_name' => Auth::user()->name
            ],
            'enabled_payments' => [
                "credit_card", "cimb_clicks",
                "bca_klikbca", "bca_klikpay", "bri_epay", "echannel", "permata_va",
                "bca_va", "bni_va", "bri_va", "other_va", "gopay", "indomaret",
                "danamon_online", "akulaku", "shopeepay"
            ],
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            return redirect($paymentUrl);
            // header('location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "is show";
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
