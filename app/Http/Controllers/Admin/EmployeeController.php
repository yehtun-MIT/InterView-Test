<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{

    public function index()
    {
        return view('admin.employees.index');
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.employees.index');
    }

    public function show(Employee $employee)
    {
        return view('admin.employees.show');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit');
    }

    public function update(Request $request, Employee $employee)
    {
        return redirect()->route('admin.employees.index');
    }

    public function destroy(Employee $employee)
    {
        return redirect()->route('admin.employees.index');
    }
}
