<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use App\Models\UserIdentity;
use Illuminate\Http\Request;

class UserIdentityController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'identity_type' => 'required|string',
            'identity_number' => 'required|integer',
        ]);

        $userDetail = UserIdentity::create([
            'user_id' => $request->user_id,
            'identity_type' => $request->identity_type,
            'identity_number' => $request->identity_number,

        ]);

        return response()->json(['user_detail' => $userDetail], 201);
    }

    public function getUsers()
    {
        $users = UserIdentity::all();
        return response()->json(['users' => $users], 200);
    }
}
