<?php
return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'all_privilege'            => 'All Privillege'
        ],
    ],
    'auditLogs' => [
        'title'          => 'Audit Logs',
        'log'            => "Login Logout",
        'title_singular' => 'Audit Logs',
        'fields'         => [
            'id'                       => 'ID',
            'name'                     => 'Name',
            'email'                    => 'Email',
            'login_time'               => 'LogIn Time',
            'logout_time'              => 'LogOut Time'
        ],
    ],
    'user_info' => [
        'general_info'          => 'Personal Information',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'name'                     => 'Name',
            'email'                    => 'Email',
            'password'                 => 'Password',
            'confirm_password'          => 'Confrim Password',
            'role'  => 'Role', 
            'avatar'=> 'Avatar',
            'change_password' => 'Change Password', 
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'confirm_password' => 'Re-type Password',
        ],
    ],
];