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
        $validatorRules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'phone_number' => ['required', 'string'],
        ];

        Validator::make($input, $validatorRules)->validate();

        $user = User::create([
            'name' => $input['name'] ?? null,
            'email' => $input['email'],
            'role_id' => $input['role_id'],
            'password' => Hash::make($input['password']),
        ]);

        $user->userDetail()->create([
            'phone_number' => $input['phone_number'],
        ]);

        if (isset($input['identity_number'])) {
            $user->userIdentity()->create([
                'identity_number' => $input['identity_number'],
            ]);
        }

        return $user;
    }
}

