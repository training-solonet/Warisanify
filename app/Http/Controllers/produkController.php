<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = kategori::all()->pluck('nama_kategori', 'id');

        if ($request->ajax()) {
            $produk = produk::with('kategori')->orderByDesc('created_at');
            return Datatables::of($produk)
                ->addIndexColumn()
                ->addColumn('actions', function ($produk) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $produk->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $produk->id . '" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                    return $button;
                })
                // ->addColumn('kategori', function (produk $dataProduk) {
                //     return $dataProduk->kategori->nama_kategori;
                // })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('Admin.index', compact('kategori'));
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
            'produk' => 'required',
            //'foto' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'harga' => 'required',
            'detailProduk' => 'required',
            'id_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        //update
        if ($request->id) {

            //ketika ada foto
            if ($request->foto) {

                $namaFoto = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('pict'), $namaFoto);

                produk::find($request->id)->update(
                    [
                        'produk' => $request->produk,
                        'foto' => $namaFoto,
                        'harga' => $request->harga,
                        'detailProduk' => $request->detailProduk,
                        'id_kategori' => $request->id_kategori
                    ]
                );
            } else {

                produk::find($request->id)->update(
                    [
                        'produk' => $request->produk,
                        'harga' => $request->harga,
                        'detailProduk' => $request->detailProduk,
                        'id_kategori' => $request->id_kategori
                    ]
                );
            }

            //create
        } else {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('pict'), $namaFoto);

            produk::create(
                [
                    'produk' => $request->produk,
                    'foto' => $namaFoto,
                    'harga' => $request->harga,
                    'detailProduk' => $request->detailProduk,
                    'id_kategori' => $request->id_kategori
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
        // $post = produk::find($id);

        // return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $where = array('id' => $id);
        // $post  = produk::where($where)->first();
        $post = produk::find($id);

        return response()->json($post);
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
        // produk::update($request->find($id));
        $produk = produk::find($id);
        $produk->update($request->all());

        return response()->json('data Berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = produk::where('id', $id)->delete();

        return response()->json($post);
    }
}
