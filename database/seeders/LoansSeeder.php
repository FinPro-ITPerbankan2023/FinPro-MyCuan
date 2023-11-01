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

        foreach (range(1, 3) as $index) {
            DB::table('loans')->insert([
                'id' => $index,
                'user_id' => $index,
                'loan_status' => 'BELUM DIDANAI',
                'is_verified' => '0',
                'loan_purpose' => $faker->text,
                'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 100000),
                'loan_duration' => '12 Bulan',
                'application_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
