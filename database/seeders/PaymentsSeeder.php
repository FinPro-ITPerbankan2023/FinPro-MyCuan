<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 3) as $index) {
            DB::table('payments')->insert([
                'user_id' => $index,
                'loan_id' => $index,
                'order_id' => rand(100000000000, 9999999999999,),
                'amount' => rand(100000000000, 9999999999999),
                'status' => 'pending',
                'payment_link' => $faker->url(),
                'payment_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
