<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index(Request $request)
    {
        //jika ada request
        if ($request->get('search')) {
            $barang = Barang::with('kategori')->where('namaBarang', 'like', '%' . $request->get('search') . '%')->get();
        } else {
            $barang = Barang::with('kategori')->get();
        }

        return view('shop', compact('barang'));
    }
}
