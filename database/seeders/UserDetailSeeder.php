<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('user_details')->insert([
                'user_id' => $index,
                'number_identity' => $faker->randomNumber(null,false),
                'date_birth' => $faker->date,
                'birth_place' => $faker->name,
                'street' => $faker->streetAddress,
                'district' => $faker->streetName,
                'city' => $faker->city,
                'province' => $faker->city,
                'zip_code' => $faker->postcode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
