<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterPageController extends Controller
{
    //
    public function registerRole()
    {
        return view('register-role');
    }

    public function RegisterLenderPage()
    {
        return view('lender.auth.register');
    }

    public function RegisterBorrowerPage()
    {
        return view('borrower.auth.register');
    }

    public function RegisterBorrowerProfilePage()
    {
        return view('borrower.auth.register-penerima-datadiri');
    }

    public function RegisterBorrowerBusinessPage()
    {
        return view('borrower.informasi-bisnis');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
