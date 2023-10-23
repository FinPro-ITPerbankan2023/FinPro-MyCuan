<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Illuminate\Http\Request;

class RegisterUserIndentityBorrowController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'identity_number' => ['required','numeric'],
            'identity_image' => ['required'],
            'selfie_image' => ['required'],
        ]);
        $numberIdentity = 1;
        $userIdentity = UserIdentity::create([
            'user_id' => $request->user()->id,
            'user_identity' => $numberIdentity,
            'identity_number' => $numberIdentity,
            'identity_image' => 'oke',
            'selfie_image' => 'oke'
        ]);
        return $userIdentity;
            
    }
}
