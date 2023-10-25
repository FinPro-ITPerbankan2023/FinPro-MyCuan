<?php

namespace App\Http\Controllers\Lender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LenderController extends Controller
{
    public function index(){

        return view('lender.dashboard.index');
    }
}
