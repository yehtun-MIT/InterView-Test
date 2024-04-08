<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    protected $employees;
    protected $department;
    public function __construct(Employee $employees, Department $department)
    {
        $this->employees = $employees;
        $this->department = $department;
    }
    public function index()
    {
        abort_if(Gate::denies("employee_access"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employees = $this->employees->all();
        $department = $this->department->all();
        return view('admin.employees.index',compact('employees', 'department'));
    }

    public function create()
    {
        abort_if(Gate::denies("employee_create"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employees = $this->employees->all();
        $department = $this->department->all()->pluck('name','id');
        return view('admin.employees.create', compact(['employees', 'department']));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employees->create($request->all());
        return redirect()->route('admin.employees.index')->with('message' ,'Employee Create Successfuly!');
    }

    public function show($id)
    {
        abort_if(Gate::denies("employee_show"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employees = $this->employees->findOrFail($id);
        $department = $this->department->all();
        return view('admin.employees.show',compact('employees', 'department'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies("employee_edit"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employees = $this->employees->findOrFail($id);
        $department = $this->department->all()->pluck('name','id');
        return view('admin.employees.edit',compact('employees', 'department'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employees = $this->employees->findOrFail($id);
        $employees->update($request->all());
        return redirect()->route('admin.employees.index')->with('message' ,'Employee Update Successfuly!');
    }

    public function trashList()
    {
        abort_if(Gate::denies("employee_trashList"), Response::HTTP_FORBIDDEN, "403 Forbidden");
        $employees = $this->employees->onlyTrashed()->get();
        $department = $this->department->all();
        return view('admin.employees.trashList', compact('employees', 'department'));
    }

    public function restoreTrash($id)
    {
        $employees = $this->employees->withTrashed()->find($id)->restore();
        return redirect()->route('admin.employees.index')->with('message' , 'Employee Restore Successfully!');
    }
    public function trashDelete($id)
    {
        $employees = $this->employees->withTrashed()->find($id);

        if ($employees) {
            $employees->forceDelete();
                return redirect()->route('admin.employees.trashList')->with('message',"Trash Data Delete Successfully!");
        } else {
            return redirect()->route('admin.employees.trashList')->with("message","Fail");
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies("employee_delete"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employees = $this->employees->findOrFail($id);
        $employees->delete();
        return redirect()->route('admin.employees.index')->with('message' ,'Employee Delete Successfuly!');
    }
    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
