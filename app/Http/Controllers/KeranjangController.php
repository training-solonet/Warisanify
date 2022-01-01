<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KeranjangController extends Controller
{
    public function addToCart(Request $request){
        $jumlah_barang = $request->jumlah_barang;
        
        return view('keranjangPage.index', compact('jumlah_barang'));
    }
}
