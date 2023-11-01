<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        DB::table('users')->insert([
            'name' => 'Lender',
            'role_id' => 1,
            'email' => 'lender@mycuan.com',
            'email_verified_at' => now(),
            'password' => Hash::make('r4ngk1ng'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Borrower',
            'role_id' => 2,
            'email' => 'borrower@mycuan.com',
            'email_verified_at' => now(),
            'password' => Hash::make('r4ngk1ng'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'role_id' => 3,
            'email' => 'admin@mycuan.com',
            'email_verified_at' => now(),
            'password' => Hash::make('r4ngk1ng'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
