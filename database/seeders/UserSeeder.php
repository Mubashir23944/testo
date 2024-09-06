<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => Hash::make('password'), 'dept_id' => 1],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => Hash::make('password'), 'dept_id' => 2],
            ['name' => 'Michael Brown', 'email' => 'michael@example.com', 'password' => Hash::make('password'), 'dept_id' => 3],
        ]);
    }
}
