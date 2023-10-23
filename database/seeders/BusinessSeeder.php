<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('business')->insert([
                'id' => $index,
                'user_id' => $index,
                'business_name' => $faker->name,
                'field_of_business' => $faker->name,
                'business_ownership' => $faker->name,
                'business_duration' => $faker->streetName,
                'income_avg' => $faker->numberBetween(1000, 3000000),
                'business_permit_image' => $faker->imageUrl,
                'business_place_image' => $faker->imageUrl,
                'business_product_image' => $faker->imageUrl,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
