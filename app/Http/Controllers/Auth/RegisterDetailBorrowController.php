<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class RegisterDetailBorrowController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date_birth' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric','min:5','max:13'],
            'mother_maiden' => ['required', 'string','max:255'],
            'user_identity' => ['required', 'numeric'],
        ]);
        $user = UserDetail::create([
            'date_birth' => $request->date_birth,
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric','min:5','max:13'],
            'mother_maiden' => ['required', 'string','max:255'],
            'user_identity' => ['required', 'numeric'],
        ]);
        return $user;
       
    }
}
