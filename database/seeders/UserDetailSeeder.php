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

        foreach (range(1, 5) as $index) {
            DB::table('user_detail')->insert([
                'user_id' => $index,
                'date_birth' => $faker->date,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'mother_maiden' => $faker->name,
                'user_identity' => $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}