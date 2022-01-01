<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return view('adminPage.tableBarang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view('adminPage.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required|max:30',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'detailProduk' => 'required',
            'idKategori' => 'required'
        ]);

        $namaGambar = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('pict'), $namaGambar);


        Barang::create([
            'namaBarang' => $request->namaBarang,
            'harga' => $request->harga,
            'gambar' => $namaGambar,
            'detailProduk' => $request->detailProduk,
            'idKategori' => $request->idKategori
        ]);
        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambah!');
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
        $barang = Barang::with('kategori')->find($id);
        $kategori = Kategori::get();
        // return $barang;
        return view('adminPage.edit', compact('barang', 'kategori'));
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
        Barang::find($id)->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Data berhasil di-Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('id', $id)->delete();
        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus!');
    }
}
