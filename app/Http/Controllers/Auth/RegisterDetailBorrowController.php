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
            'user_identity' => ['required', 'numeric'],
            'date_birth' => ['required', 'date'],
            'place_birth' => ['required', 'string','max:100'],
            'address_home' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric','min:5','max:13'],
            'mother_maiden' => ['required', 'string','max:255'],
        ]);
        $userId = $request->user()->id;
        $user = UserDetail::create([
            'user_id' => $userId,
            'user_identity' => $request->user_identity,
            'date_birth' => $request->date_birth,
            'place_birth' => $request->place_birth,
            'address_home' => $request->address_home,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'phone_number' => $request->phone_number,
            'mother_maiden' => $request->mother_maiden,
        ]);
        return $user;
       
    }
}
