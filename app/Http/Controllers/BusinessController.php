<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function InsertTable(Request $request)
    {

        $request->validate([
            'user_id' => 'required|integer',
            'business_name' => 'required|string',
            'field_of_business' => 'required|string',
            'business_ownership' => 'required|string',
            'business_duration' => 'required|string',
            'income_avg' => 'required|integer',
        ]);

        $userDetail = Business::create([
            'user_id' => $request->user_id,
            'business_name' => $request->business_name,
            'field_of_business' => $request->field_of_business,
            'business_ownership' => $request->business_ownership,
            'business_duration' => $request->business_duration,
            'income_avg' => $request->income_avg,
        ]);

        return response()->json(['users' => $userDetail], 201);
    }

    public function getBusiness()
    {
        $users = Business::all();
        return response()->json(['business' => $users], 200);
    }

}
