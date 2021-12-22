<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        return $request->validate([
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'Cpassword' => 'required|min:5|max:255'
        ]);

        dd('registrasi berhasil!!');
    }
}
