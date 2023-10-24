<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Exception;
use Illuminate\Http\Request;

header('Content-Type: application/json; charset=utf-8');

class UserBorrowersDetailController extends Controller
{

    public function show($id) {

    }

    public function store(Request $request)
    {
        $request->validate([
            'date_birth' => 'required|date',
            'number_identity' => 'required|numeric|min:5',
            'birth_place' => 'required|string|max:100',
            'street' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'zip_code' => 'required|integer',
            'account_number' => 'required|integer|min:5',
            'account_name' => 'required|string|max:100',
            'bank_name' => 'required|string|max:32',
        ]);
        try {
            $getid= User::latest('id')->first()->id;
            $user = UserDetail::create([
                'user_id' => $getid,
                'number_identity' => $request->number_identity,
                'date_birth' => $request->date_birth,
                'birth_place' => $request->birth_place,
                'street' => $request->street,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'zip_code' => $request->zip_code,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
                'bank_name' => $request->bank_name,
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
