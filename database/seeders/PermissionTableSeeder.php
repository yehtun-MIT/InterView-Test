<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' =>'audit_logs_access'
            ],
            [
                'id'    => 18,
                'title' =>'audit_logs_show'
            ],
            [
                'id'    => 19,
                'title' =>'audit_logs_delete'
            ],
            [
                'id'    => 20,
                'title' => 'employee_create',
            ],
            [
                'id'    => 21,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 22,
                'title' => 'employee_show',
            ],
            [
                'id'    => 23,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 24,
                'title' => 'employee_access',
            ],
            [
                'id'    => 25,
                'title' => 'department_access',
            ],
            [
                'id'    => 26,
                'title' => 'department_create',
            ],
            [
                'id'    => 27,
                'title' => 'department_edit',
            ],
            [
                'id'    => 28,
                'title' => 'department_show',
            ],
            [
                'id'    => 29,
                'title' => 'department_delete',
            ],
            [
                'id'    => 30,
                'title' => 'department_trashList',
            ],
            [
                'id'    => 31,
                'title' => 'employee_profiles_access',
            ],
            [
                'id'    => 32,
                'title' => 'employee_profiles_show',
            ],
            [
                'id'    => 33,
                'title' => 'employee_profiles_delete',
            ],
            [
                'id'    => 34,
                'title' => 'employee_profiles_create',
            ],
            [
                'id'    => 35,
                'title' => 'employee_profiles_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
