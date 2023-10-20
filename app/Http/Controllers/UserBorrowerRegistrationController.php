<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserBorrowerRegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'date_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $userDetail = UserDetail::create([
            'user_id' => $request->user_id,
            'date_birth' => $request->date_birth,
            'address' => $request->address,
            'phone_number' => $request->phone_number,

        ]);

        return response()->json(['user_detail' => $userDetail], 201);
    }

    public function getUsers()
    {
        $users = UserDetail::all();
        return response()->json(['users' => $users], 200);
    }
}
