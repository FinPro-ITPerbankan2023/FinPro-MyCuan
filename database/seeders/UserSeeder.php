<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
{
        DB::table('users')->insert([
        // Admin Seeder Data

        // Agent Seeder Data
        [
            'name' =>'Lender',
            'email_verified_at' =>  now(),
            'email'=>'lender@site.com',
            'password'=>Hash::make('password'),
            'role_id'=>'1',
        ],
        // Agent Seeder Data
        [
            'name' =>'Borrower',
            'email_verified_at' =>  now(),
            'email'=>'borrower@site.com',
            'password'=>Hash::make('password'),
            'role_id'=>'2',
        ],

    ]);
}
}
