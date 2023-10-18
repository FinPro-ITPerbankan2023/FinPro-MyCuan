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
                'identity_type' => 'KTP',
                'identity_number' => rand(1000000000000000, 9999999999999999),
                'identity_image' => $faker->image('public/storage/identity_images', 100, 100, null, false),
                'selfie_image' => $faker->image('public/storage/selfie_images', 100, 100, null, false),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

