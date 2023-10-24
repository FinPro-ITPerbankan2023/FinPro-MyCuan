<?php

// EditProfileLender.php
namespace App\Http\Controllers\Lender;

// EditProfileLender.php
namespace App\Http\Controllers\Lender;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserIdentity;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class EditProfileLender extends Controller
{
    public function retrieveData(Request $request)
    {
        try {
            $userId = $request->input('user_id');

            $userData = User::select('email', 'name', 'profile_photo_path')
                ->where('id', $userId)
                ->first();

            $identityData = UserIdentity::select('identity_number')
                ->where('user_id', $userId)
                ->first();

            $detailData = UserDetail::select('phone_number')
                ->where('user_id', $userId)
                ->first();

            $response = [
                'email' => $userData->email,
                'name' => $userData->name,
                'profile_photo_path' => $userData->profile_photo_path,
                'identity_number' => $identityData->identity_number,
                'phone_number' => $detailData->phone_number,
            ];


            return response()->json($response);
        } catch (\Exception $e) {

            if (!$userId) {
                return response()->json(['error' => 'User ID not provided'], 400);
            }

        }
    }

    public function editData(Request $request)
    {
        try {
            // Check if the user is authenticated
            $userId = $request->input('user_id');

            $user = User::find($userId);
            $identity = UserIdentity::where('user_id', $userId)->first();
            $detail = UserDetail::where('user_id', $userId)->first();

            if (!$user || !$identity || !$detail) {
                return response()->json(['error' => 'User data not found'], 404);
            }

            if ($request->has('email')) {
                $user->email = $request->input('email');
                $user->save();
            }

            if ($request->has('name')) {
                $user->name = $request->input('name');
                $user->save();
            }

            if ($request->has('profile_photo_path')) {
                $user->profile_photo_path = $request->input('profile_photo_path');
                $user->save();
            }

                if ($request->has('identity_number')) {
                $identity->identity_number = $request->input('identity_number');
                $identity->save();
            }

            if ($request->has('phone_number')) {
                $detail->phone_number = $request->input('phone_number');
                $detail->save();
            }

            return response()->json(['message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update data'], 500);
        }
    }
}


