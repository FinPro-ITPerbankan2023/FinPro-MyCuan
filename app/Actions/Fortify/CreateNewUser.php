<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user along with associated details.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'date_birth' => ['required', 'date'],
            'phone_number' => ['required', 'string'],
            'address' => ['required', 'string'],
            'identity_number' => ['required', 'string'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->userDetail()->create([
            'date_birth' => $input['date_birth'],
            'phone_number' => $input['phone_number'],
            'address' => $input['address'],
        ]);

        $user->userIdentity()->create([
            'identity_number' => $input['identity_number'],
        ]);

        return $user;
    }
}

