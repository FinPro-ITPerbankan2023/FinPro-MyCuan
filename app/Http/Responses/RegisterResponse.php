<?php
namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as Response;

class RegisterResponse implements Response
{
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(
                auth()->user()->role_id == 1 ? url('/lender') : (auth()->user()->role_id == 2 ? route('register-borrower-profile') : route('home'))
            );
    }
}
