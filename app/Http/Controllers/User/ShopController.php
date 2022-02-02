<?php

namespace App\Http\User\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return route('home.index');
        // return view('user.shop');
    }
}
