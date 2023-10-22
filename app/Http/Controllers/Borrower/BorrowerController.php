<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BorrowerController extends Controller
{
    public function index()
    {
        if (Gate::denies('manage-products')) {
            return view('error.403');
        }
        return view('borrower.dashboard.index');
    }
}
