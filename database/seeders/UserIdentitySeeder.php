<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserIdentitySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('user_identity')->insert([
                'user_id' => $index,
                'identity_number' => rand(1000000000000000, 9999999999999999),
                'identity_image' => $faker->imageUrl(100, 100, 'people', true),
                'selfie_image' => $faker->imageUrl(100, 100, 'people', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}