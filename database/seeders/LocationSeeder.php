<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::insert([
            ['name' => 'Location 1', 'created_by' => 1, 'updated_by' => 1, 'status' => 1],
            ['name' => 'Location 2', 'created_by' => 1, 'updated_by' => 1, 'status' => 1],
            ['name' => 'Location 3', 'created_by' => 1, 'updated_by' => 1, 'status' => 1],
        ]);
    }
}
