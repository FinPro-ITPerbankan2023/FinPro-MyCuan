<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    public function InsertTable(Request $request)
    {
        $request->validate([
            'business_permit_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_place_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required|integer',
            'business_name' => 'required|string',
            'field_of_business' => 'required|string',
            'business_ownership' => 'required|string',
            'business_duration' => 'required|string',
            'income_avg' => 'required|integer',
        ]);

        // Upload business_permit_image
        $permitFileName = $request->business_permit_image->getClientOriginalName();
        $permitFilePath = 'business_permit_images/' . $permitFileName;
        $permitPath = Storage::disk('s3')->put($permitFilePath, file_get_contents($request->business_permit_image));
        $permitUrl = Storage::disk('s3')->url($permitFilePath);

        // Upload business_place_image
        $placeFileName = $request->business_place_image->getClientOriginalName();
        $placeFilePath = 'business_place_images/' . $placeFileName;
        $placePath = Storage::disk('s3')->put($placeFilePath, file_get_contents($request->business_place_image));
        $placeUrl = Storage::disk('s3')->url($placeFilePath);

        // Upload business_product_image
        $productFileName = $request->business_product_image->getClientOriginalName();
        $productFilePath = 'business_product_images/' . $productFileName;
        $productPath = Storage::disk('s3')->put($productFilePath, file_get_contents($request->business_product_image));
        $productUrl = Storage::disk('s3')->url($productFilePath);

        // Create Business record
        $userDetail = Business::create([
            'user_id' => $request->user_id,
            'business_name' => $request->business_name,
            'field_of_business' => $request->field_of_business,
            'business_ownership' => $request->business_ownership,
            'business_duration' => $request->business_duration,
            'income_avg' => $request->income_avg,
            'business_permit_image' => $permitUrl,
            'business_place_image' => $placeUrl,
            'business_product_image' => $productUrl,
        ]);

        return response()->json(['users' => $userDetail], 201);
    }


    public function getBusiness()
    {
        $users = Business::all();
        return response()->json(['business' => $users], 200);
    }

}
