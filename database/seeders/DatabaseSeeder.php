<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserDetailSeeder::class);
        $this->call(UserIdentitySeeder::class);
        $this->call(SessionsSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(LoansSeeder::class);
        $this->call(BankDetailSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(IndoBankSeeder::class);

    }
}
