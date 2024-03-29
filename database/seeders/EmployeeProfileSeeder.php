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
            'employee_id' => 1,
            'emp_code' => 'EMP001',
        ]);

        // Seed 2
        EmployeeProfile::create([
            'employee_id' => 2,
            'emp_code' => 'EMP002',
        ]);

        // Seed 3
        EmployeeProfile::create([
            'employee_id' => 3,
            'emp_code' => 'EMP003',
        ]);
    }
}
