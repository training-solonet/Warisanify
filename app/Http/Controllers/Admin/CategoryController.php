<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::get();
        if ($request->ajax()) {
            return DataTables::of($category)
                ->addIndexColumn()
                ->addColumn('action', function ($category) {
                    $button = '
                <div class="btn-group" id="cek">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <button type="button" onclick="editCategory(' . $category->id . ')" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</button>
                                </li>
                                <li>
                                    <button type="submit" id="" onclick="deleteShowModal(' . $category->id . ')" name="delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>
                                </li>
                            </ul>
                        </div>
                ';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.partial.categoryTable');
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
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->errors()]);
        }

        //update
        if ($request->id) {
            Category::find($request->id)->update([
                'name' => $request->name
            ]);
            //create
        } else {
            Category::create([
                'name' => $request->name
            ]);
        }

        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = Category::where('id', $id);
        // return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return response()->json($category);
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
        $category = Category::where('id', $id)->update($request->all());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->delete();
        return response()->json($category);
    }
}
