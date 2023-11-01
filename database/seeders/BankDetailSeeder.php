<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_details')->insert([
            'bank_name' => 'BCA',
            'user_id' => 1,
            'bank_number' => '112361515',
        ]);

        DB::table('bank_details')->insert([
            'bank_name' => 'BNI',
            'user_id' => 2,
            'bank_number' => '23123131',
        ]);

        DB::table('bank_details')->insert([
            'bank_name' => 'MANDIRI',
            'user_id' => 3,
            'bank_number' => '123212131241',
        ]);
    }
}
