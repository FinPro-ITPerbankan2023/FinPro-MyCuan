<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterPenerimaDanaController extends Controller
{
    public function registerpenerimadana(){
        return view('register-penerima-dana');
    }
}
