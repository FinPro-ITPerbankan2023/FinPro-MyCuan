<?php

namespace App\Http\Controllers\Borrower;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use \Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BorrowerController extends Controller
{
    public function index()
    {
        return view('borrower.dashboard.index');
    }

    public function insertTable(Request $request)
    {
        $request->validate([
            //table user_identity
            'identity_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'selfie_image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           
            //table user_details
            'date_birth' => 'required|date',
            'birth_place' => 'required|string|max:100',
            'street' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'post_code' => 'required|numeric',
            
            //table bank_details
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
                'date_birth' => $request->date_birth,
                'birth_place' => $request->birth_place,
                'street' => $request->street,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'post_code' => $request->post_code,
            ]);
            $user->BankDetail()->create([
                'user_id' => $getid,
                'bank_name'=> $request->bank_name,
                'bank_number'=> $request->bank_number,
            ]);


                // Upload identity image
                $identityFileName = $request->identity_image->getClientOriginalName();
                $identityFilePath = 'identity_image/' . $identityFileName;
                $identityPath = Storage::disk('s3')->put($identityFilePath, file_get_contents($request->identity_image));
                $identityUrl = Storage::disk('s3')->url($identityFilePath);

                // Upload selfie image
                $selfieFileName = $request->selfie_image->getClientOriginalName();
                $selfieFilePath = 'selfie_images/' . $selfieFileName;
                $selfiePath = Storage::disk('s3')->put($selfieFilePath, file_get_contents($request->selfie_image));
                $selfieUrl = Storage::disk('s3')->url($selfieFilePath);

              
            //add users identity
            $user->UserIdentity()->create([
            'user_id' => $getid,
            'identity_image' => $identityUrl,
            'selfie_image' => $selfieUrl,
            ]);

            DB::commit();
            // dd($user);
            dd($request->all());
            return redirect()->back()->with('message','Property added successfully!');

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


