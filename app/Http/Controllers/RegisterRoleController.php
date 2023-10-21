<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterRoleController extends Controller
{
    //
    public function registerRole(){
        return view('register-role');
    }

    public function RegisterBorrowerPage(){
        return view('auth.register-borrower');
    }
}
