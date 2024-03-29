<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments=[
            ['name' => 'Human Resources',],
            [ 'name' => 'Marketing',],
            [ 'name' => 'Finance',]
        ];
        Department::insert($departments);
    }
}
