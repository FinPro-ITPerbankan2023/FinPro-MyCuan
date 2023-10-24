<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetail>
 */
class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'number_identity' => $this->faker->randomNumber(null,false),
                'date_birth' => $this->faker->date,
                'birth_place' => $this->faker->address,
                'street' => $this->faker->streetAddress,
                'district' => $this->faker->streetName,
                'city' => $this->faker->city,
                'province' => $this->faker->city,
                'account_number' => $this->faker->randomNumber,
                'account_name' => $this->faker->name,
                'bank_name' => $this->faker->name,
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
