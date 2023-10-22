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
        [
            'name' =>'Admin',
            'email'=>'admin@site.com',
            'email_verified_at' =>  now(),
            'password'=>Hash::make('12345678'),
            'role_id'=>'1',
        ],

        // Agent Seeder Data
        [
            'name' =>'Seller',
            'email_verified_at' =>  now(),
            'email'=>'seller@site.com',
            'password'=>Hash::make('12345678'),
            'role_id'=>'2',
        ],
        // Agent Seeder Data
        [
            'name' =>'User',
            'email'=>'user@site.com',
            'email_verified_at' =>  now(),
            'password'=>Hash::make('12345678'),
            'role_id'=>'3',
        ],

    ]);
}
}
