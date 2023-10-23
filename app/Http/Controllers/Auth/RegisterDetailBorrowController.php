<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Exception;
use Illuminate\Http\Request;

header('Content-Type: application/json; charset=utf-8');

class RegisterDetailBorrowController extends Controller
{

    public function show($id) {

    }

    public function store(Request $request)
    {
        $request->validate([
            'date_birth' => 'required|date',
            'birth_place' => 'required|string|max:100',
            'street' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'phone_number' => 'required|integer|min:5|max:13',
            'post_code' => 'required|integer|max:255',
        ]);
        try {
            $user = UserDetail::create([
                'user_id' => $request->user_id,
                'date_birth' => $request->date_birth,
                'birth_place' => $request->birth_place,
                'street' => $request->street,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'phone_number' => $request->phone_number,
                'post_code' => $request->post_code,
            ]);
            return response()->json(['data' => $user],201);
        }
        catch (Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);
        }
       
    }
    public function getAll() 
    {
        $userDetail = UserDetail::all();
        return response()->json(['data' => $userDetail],200);
    }
}
