<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'firstName' => 'Vo',
            'lastName' => 'Duc Huy',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'phoneNumber' => '0962785101',
            'roles' => 'admin',
            'userStatus' => 'active',
            'email_verified_at' => today(),
            'isRoot' => 1,
        ]);
    }
}
