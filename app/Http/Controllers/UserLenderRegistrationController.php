<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserLenderRegistrationController extends Controller
{
// app/Http/Controllers/UserDetailsController.php
    public function store(Request $request)
    {

        $user = User::find($request->user_id);

        $user->detail()->create([
            'birth_date' => $request->birth_date,
            'phone_number' => $request->phone_number,
            'address' => $request->address,

        ]);

        return response()->json(['message' => 'User details created successfully']);
    }

    public function show($userId)
    {
        $user = User::find($userId);

        return response()->json(['user_detail' => $user->detail]);
    }

}
