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

        foreach (range(1, 3) as $index) {
            DB::table('user_detail')->insert([
                'user_id' => $index,
                'date_birth' => $faker->date,
                'birth_place' => $faker->name,
                'street' => $faker->streetAddress,
                'district' => $faker->streetName,
                'city' => $faker->city,
                'province' => $faker->city,
                'post_code' => rand(1 ,20000),
                'phone_number' => rand(1 ,20000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
