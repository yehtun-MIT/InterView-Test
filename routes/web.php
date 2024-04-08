<?php

use App\Models\Permission;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // User
    Route::delete('users/destroy', 'UserController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UserController');

    //Profile
    Route::get('user_info/index', function () {
        return view('admin.usersetting.index');
    })->name('user_info.index');
    Route::put('user_info/edit/profile/{id}', 'ProfileController@updateProfile')->name('user_info.updateProfile');
    Route::put('user_info/updatePassword/{id}', 'ProfileController@updatePassword')->name('user_info.updatePassword');

    // Permission
    Route::delete('permissions/destroy', 'PermissionController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionController');

    // Roles
    Route::delete('roles/destroy', 'RoleController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RoleController');

    // AuditLogs
    Route::delete('audit_logs/destroy', 'AuditLogsController@massDestroy')->name('audit_logs.massDestroy');
    Route::get('export/audit_logs', 'AuditLogsController@exportCsv')->name('audit_logs.export');
    Route::resource('audit_logs', 'AuditLogsController');

    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Employee
    Route::resource('employees', 'EmployeeController');


    // Employee Profile
    Route::resource('employee-profile', 'EmployeeProfileController');

    // Department
    Route::delete('department/destroy', 'DepartmentController@massDestroy')->name('department.massDestroy');
    Route::get('department/trash', 'DepartmentController@trashList')->name('department.trashList');
    Route::get('department/restore/trash/{id}','DepartmentController@restoreTrash')->name('department.restore.trash');
    Route::delete('department/trashDelete/{id}','DepartmentController@trashDelete')->name('department.trashDelete');
    Route::get('department/getmeasurement/{id}','DepartmentController@getmeasurement')->name('department.getmeasurement');
    Route::resource('department', 'DepartmentController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
