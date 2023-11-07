<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PrasyaratPenerimaDanaController extends Controller
{
    public function Prasyaratpenerimadana()
    {
        return view('prasyarat-penerima-dana');
    }
}
