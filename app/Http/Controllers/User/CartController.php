<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(request()->ajax()){
        $products = Cart::with('product.category:id,name')->where('user_id', Auth::user()->id)->get();
        return Datatables::of($products)
        ->addIndexColumn()
        ->addColumn('image', function ($row) {

            $actionBtn = '
                    <center>
                    <img src="/Assets/images/warisan_1.png" style="width:50px;">
                    </center>';

            return $actionBtn;
        })
        ->addColumn('total', function ($row) {

            $actionBtn = number_format($row->qty * $row->product->regular_price);

            return $actionBtn;
        })
        ->addColumn('price', function ($row) {

            $actionBtn = number_format($row->product->regular_price);

            return $actionBtn;
        })
        ->addColumn('qty', function ($row) {

            $actionBtn = '<div class="qty-box">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field=""><i class="ti-angle-left" onclick="decreaseQty('.$row->id.')"></i></button> </span>
                                        <input id="cart_qty" type="number" step="1" min="1" max="" pattern="" inputmode="" name="cart_qty" onchange="edit_cart('.$row->id.')" class="form-control input-text"
                                            value="'.$row->qty.'"> <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field=""><i class="ti-angle-right" onclick="increaseQty('.$row->id.')"></i></button></span>
                                        </span>
                                    </div>
                        </div>';

            return $actionBtn;
        })
        ->addColumn('action', function ($row) {
            $actionBtn = '
            <center>
                    <button class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="deleteCartt('.$row->id.')"><i class="far fa-trash-alt"></i></button>
            </center>';

            return $actionBtn;
        })
        ->rawColumns(['action', 'image', 'qty'])
        ->make(true);
    }
        return view('user.cart');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $productCart = Cart::where('id', $id)->select('qty')->first();
        $cek = Cart::find($id)->update([
            'qty' => $productCart->qty + $request->get('qty')
        ]);
        // return $cek;g
        return Response()->json(['status' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //ga berfaeda ini wkamdkawmmkdwakmdkwam    
        ///$product = Product::get();
        $checkReady = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first();

        if ($checkReady) {
            Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->update([
                'qty' => $request->qty + $checkReady->qty
            ]);
        } else{
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' =>  $request->product_id,
                'qty' => $request->qty
            ]);
        }
        // return "in develop";
        return Response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        // return $data;   
        return Response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        Cart::find($id)->update([
            'qty' => $request->get('qty')
        ]);

        return Response()->json(['status' => true]);
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
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->delete();
        // Cart::find($request->get(id))->delete();
        return Response()->json(['status' => true]);
    }
}
