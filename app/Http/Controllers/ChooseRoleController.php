<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChooseRoleController extends Controller
{
    public function showChooseRolePage()
    {
        return view('choose-role');
    }

    public function registerBorrower()
    {
        return view('auth.register-borrower');
    }
}
