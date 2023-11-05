<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class BorrowerController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'identity_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'selfie_image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'full_name'  => 'required|string|max:100',
            'date_birth' => 'required|date',
            'number_identity' => 'required|numeric|min:5',
            'birth_place' => 'required|string|max:100',
            'street' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'zip_code' => 'required|numeric',
            'account_number' => 'required|numeric|min:5',
            'account_name' => 'required|string|max:100',
            'bank_name' => 'required|string|max:32',
        ]);

        DB::transaction(function () {
            
        });
        try {
            $getid= User::latest('id')->first()->id;
            //add user details
            DB::beginTransaction();

            $user = UserDetail::create([
                'user_id' => $getid,
                'full_name' => $request->full_name,
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


                // Upload identity image
                $identityFileName = $request->identity_image->getClientOriginalName();
                $identityFilePath = 'identity_image/' . $identityFileName;
                $identityPath = Storage::disk('s3')->put($identityFilePath, file_get_contents($request->selfie_image));
                $identityUrl = Storage::disk('s3')->url($identityFilePath);

                // Upload selfie image
                $selfieFileName = $request->selfie_image->getClientOriginalName();
                $selfieFilePath = 'selfie_images/' . $selfieFileName;
                $selfiePath = Storage::disk('s3')->put($selfieFilePath, file_get_contents($request->selfie_image));
                $selfieUrl = Storage::disk('s3')->url($selfieFilePath);

              
            //add users identity
            UserIdentity::create([
            'user_id' => $getid,
            'identity_number' => $request->number_identity,
            'identity_image' => $identityUrl,
            'selfie_image' => $selfieUrl,
            ]);
            DB::commit();
            dd($user);
            return redirect()->route('register-penerima-datadiri')->with('success', 'Data berhasil diunggah');
            //response()->json(['data' => $user,'number_identity' =>$userIdentity],201);
        }
        catch (Exception $e){
            DB::rollback();
            return response()->json($e);
        }
       
    }
    public function getAll() 
    {
        $userDetail = UserDetail::all();
        return response()->json(['data' => $userDetail],200);
    }
}
