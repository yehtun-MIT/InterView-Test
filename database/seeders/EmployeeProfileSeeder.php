<?php

namespace Database\Seeders;

use App\Models\EmployeeProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeProfile::create([
        'name' => 'Emp 1',
        'email' => 'emp1@gmail.com',
        'address' => 'Address',
        'employee_id' => 1,
        'emp_code' => 'EMP001',
        'department_id' => 1,
        ]);
        // Seed 2
        EmployeeProfile::create([
            'name' => 'Emp 2',
            'email' => 'emp2@gmail.com',
            'address' => 'Address',
            'employee_id' => 2,
            'emp_code' => 'EMP002',
            'department_id' => 2,
        ]);

        // Seed 3
        EmployeeProfile::create([
            'name' => 'Emp 3',
            'email' => 'emp3@gmail.com',
            'address' => 'Address',
            'employee_id' => 3,
            'emp_code' => 'EMP003',
            'department_id' => 3,
        ]);
    }
}
