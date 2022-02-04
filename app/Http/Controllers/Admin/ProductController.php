<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorebies = Category::select('id', 'name')->get();
        $stocksStatus = Product::select('id', 'stock_status')->get();
        $products = Product::with('category')->orderByDesc('created_at')->get();
        if($request->ajax()) {
            return Datatables::of($products)
            ->addIndexColumn()
            ->addColumn('action', function($products){
                    // $button = '<button type="button" onclick="javascript:void(0)" data-toggle="tooltip" id="' . $products->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</button>';
                    // $button .= '&nbsp;&nbsp;';
                    // $button .= '<button type="button" name="delete" id="' . $products->id . '" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                    $button = '
                        <div class="btn-group" id="cek">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <button type="button" onclick="editProduct(' . $products->id . ')" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</button>
                                </li>
                                <li>
                                    <button type="submit" id="" onclick="deleteShowModal(' . $products->id . ')" name="delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>
                                </li>
                            </ul>
                        </div>
                    ';
                    return $button;
            })
            ->rawColumns(['action'])
            ->make(true)
            ;
        } 
        return view('admin.partial.productTable', compact('categories'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required'
        ]);

        if ($validator->fails()){
            return Response()->json(['errors' => $validator->errors()]);
        }

        if ($request->id) {
            //ketika ada image
            if ($request->image) {

                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Assets/images/'), $image);

                Product::find($request->id)->update(
                    [
                        'name' => $request->name,
                        'regular_price' => $request->regular_price,
                        'sale_price' => $request->sale_price,
                        'category_id' => $request->category_id,
                        'description' => $request->description,
                        'stock_status' => $request->stock_status,
                        'quantity' => $request->quantity,
                        'image' => $image
                    ]
                );
            } else {

                Product::find($request->id)->update(
                    [
                        'name' => $request->name,
                        'regular_price' => $request->regular_price,
                        'sale_price' => $request->sale_price,
                        'category_id' => $request->category_id,
                        'description' => $request->description,
                        'stock_status' => $request->stock_status,
                        'quantity' => $request->quantity
                    ]
                );
            }

            //create
        } else {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/Assets/images/'), $image);
            $name = $request->name;
            Product::create(
                [
                    'name' => $request->name,
                    'slug' => Str::slug($name),
                    'regular_price' => $request->regular_price,
                    'sale_price' => $request->sale_price,
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                    'stock_status' => $request->stock_status,
                    'quantity' => $request->quantity,
                    'image' => $image
                ]
            );
        }


        return response()->json(['status'   => true]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->delete();
        // return "cek destroy";
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
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
        // return $id;
        $product = Product::where('id', $id)->delete();
        return "cek destroy";
        return response()->json($product);
    }
}
