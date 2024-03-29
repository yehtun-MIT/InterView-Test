<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    protected $employees;

    public function __construct(Employee $employee)
    {
        $this->employees = $employee;
    }

    public function index()
    {
        // abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        $employees = $this->employees->all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        $this->employees->create($request->all());
        return redirect()->route('admin.employees.index')->with('message', 'Employee created successfully!');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        return view('admin.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        $employee->update($request->all());
        return redirect()->route('admin.employees.index')->with('message', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, "403 Forbidden");
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('message', 'Employee deleted successfully!');
    }
}
