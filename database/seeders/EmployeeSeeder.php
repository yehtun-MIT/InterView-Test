<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'department_id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'address' => '123 Main St, City',
            ],
            [
                'department_id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'address' => '456 Elm St, Town',
            ],
            [
                'department_id' => 3,
                'name' => 'Michael Johnson',
                'email' => 'michael@example.com',
                'address' => '789 Oak St, Village',
            ]
        ];
        Employee::insert($employees);
    }
}
