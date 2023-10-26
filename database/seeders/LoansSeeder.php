<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class LoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('loans')->insert([
                'id' => $index,
                'borrower_id' => $index,
                'loan_status' => $faker->randomElement(['approved', 'pending', 'rejected']),
                'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 100000),
                'loan_duration' => $faker->numberBetween($min = 1, $max = 12),
                'application_date' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
