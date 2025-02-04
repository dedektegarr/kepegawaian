<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                "name" => "Admin",
                "role" => "admin",
                "email" => "admin@gmail.com",
                "password" => bcrypt("password12345")
            ],
            [
                "name" => "Operator",
                "role" => "operator",
                "email" => "operator@gmail.com",
                "password" => bcrypt("password12345")
            ]
        ];

        User::insert($users);
    }
}
