<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('search')){
            $products = Product::with('category')->where('name', 'like', '%' . $request->get('search'). '%')->where('stock_status', 'instock')->paginate(5);

            return view('user.shop', compact('products'));
        } else{
            $products = Product::with('category')->where('stock_status', 'instock')->simplePaginate(5);

            return view('user.shop', compact('products'));
        }

       
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
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();
        $related_products = Product::with('category')->where('name', 'like', '%' . $product->name . '%')->get();
        $popular_products = Product::with('category')->inRandomOrder()->limit(3)->get();

        return view('user.details', [
            'product' => $product,
            'related_products' => $related_products,
            'popular_products' => $popular_products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::where('product_id', $id);

        return Response()->json([
            'price' => number_format($data->regular_price),
            'discount' => number_format($data->regular_price * 1.5)
        ]);
        
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
