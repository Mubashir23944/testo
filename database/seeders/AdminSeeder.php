<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'user_type' => 'admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt("Secret123")
            ]
        ];

        DB::table('users')->insert($users);
    }
}