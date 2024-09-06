<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::insert([
            ['name' => 'HR', 'desc' => 'Human Resources', 'location_id' => 1, 'created_by' => 1, 'updated_by' => 1, 'status' => 1],
            ['name' => 'IT', 'desc' => 'Information Technology', 'location_id' => 2, 'created_by' => 1, 'updated_by' => 1, 'status' => 1],
            ['name' => 'Finance', 'desc' => 'Finance Department', 'location_id' => 3, 'created_by' => 1, 'updated_by' => 1, 'status' => 1],
        ]);
    }
}