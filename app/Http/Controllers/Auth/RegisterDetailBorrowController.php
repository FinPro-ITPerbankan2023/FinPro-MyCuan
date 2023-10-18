<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class RegisterDetailBorrowController extends Controller
{

    public function show($id) {

    }

    public function store(Request $request)
    {
        $request->validate([
            'date_birth' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric','min:5','max:13'],
            'mother_maiden' => ['required', 'string','max:255'],
            'user_identity' => ['required', 'numeric'],
        ]);
        $userId = $request->user()->id;
        $user = UserDetail::create([
            'user_id' => $userId,
            'date_birth' => $request->date_birth,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'mother_maiden' => $request->mother_maiden,
            'user_identity' => $request->user_identity,
        ]);
        return $user;
       
    }
}
