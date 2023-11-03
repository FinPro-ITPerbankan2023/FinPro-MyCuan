<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('sessions')->insert([
                'id' => $index,
                'user_id' => $index,
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'payload' => 'some_payload_data',
                'last_activity' => now()->timestamp,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
