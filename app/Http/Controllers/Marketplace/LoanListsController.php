<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Illuminate\Http\Request;

class LoanListsController extends Controller
{
    public function retrieveLoanList(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            $userData = User::select('name')
                ->where('id', $userId)
                ->first();

            $businessData = Business::select('business_name', 'field_of_business')
                ->where('id', $userId)
                ->first();


            $detailData = UserDetail::select('city', 'province')
                ->where('user_id', $userId)
                ->first();

            $response = [
                'name' => $userData->name,
                'business_name' => $businessData->business_name,
                'field_of_business' => $businessData->field_of_business,
                'city' => $detailData->city,
                'province' => $detailData->province,


            ];


            return response()->json($response);
        } catch (\Exception $e) {

            if (!$userId) {
                return response()->json(['error' => 'User ID not provided'], 400);
            }

        }
    }
}
