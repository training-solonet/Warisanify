<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = Keranjang::get();
        return $keranjang;
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
            $jumlah_barang = $request->jumlah_barang;
            $id_barang = $request->id_barang;

            if(Auth::check()){
            $barangCek = Barang::where('id', $id_barang)->first();
            $keranjang = Keranjang::where('id_barang', $id_barang)->first();

            if($barangCek){

                if(Keranjang::where('id_barang', $id_barang)->where('id_user', Auth::id())->exists()){

                    $keranjang->update(['jumlah_barang' => $keranjang->jumlah_barang + $request->jumlah_barang]);
                    return redirect()->route('shop')->with('success', 'already');

                } else {
                    $barangKeranjang = new Keranjang();
                    $barangKeranjang->id_barang = $id_barang;
                    $barangKeranjang->id_user = Auth::id();
                    $barangKeranjang->jumlah_barang = $jumlah_barang;
                    $barangKeranjang->save();

                    return redirect()->route('shop')->with('success', 'success added');

                }
                // return view('keranjangPage.index');
            }
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
