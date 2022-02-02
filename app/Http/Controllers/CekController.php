<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CekController extends Controller
{
    // public function index(){

    //     // $key = config('services.rajaongkir.key', '8ae7e24abf0fa4a5baba06ed12a408db');

    //     $response = Http::withHeaders([
    //         'key' => "8ae7e24abf0fa4a5baba06ed12a408db"
    //     ])->get('https://api.rajaongkir.com/starter/province');

    //     $data = json_decode($response, true);

    //     return $data;
    // }
    public function index(Request $request){

        $key = config('services.rajaongkir.key', '');

        $response = Http::get('https://api.rajaongkir.com/starter/city', [
            'key'          => $key,
            'province'     => $request->get('province_id')
        ]);

        $data = json_decode($response, true);

        return $data;

    }
}
