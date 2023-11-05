<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(
                auth()->user()->role_id == 1 ? url('/lender') : (auth()->user()->role_id == 2 ? url('/borrower') : route('home'))
            );
    }

}
