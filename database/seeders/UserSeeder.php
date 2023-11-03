<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Database\Factories\UserIdentityFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
{
        User::factory()->has(UserDetail::factory())->count(10)->create();
}
}
