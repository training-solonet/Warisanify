<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class shopController extends Controller
{
    public function index(Request $request)
    {
        // $barang = Barang::get();
        // $keranjang = Keranjang::get();

        //jika ada request
        if ($request->get('search')) {
            $barang = Barang::with('kategori')->where('namaBarang', 'like', '%' . $request->get('search') . '%')->get();
        } else {
            $barang = Barang::with('kategori')->get();
        }

        return view('shop', compact('barang'));
    }
}
