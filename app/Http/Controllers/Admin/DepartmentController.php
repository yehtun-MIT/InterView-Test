<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{

    protected $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }
    public function index()
    {
        abort_if(Gate::denies("department_access"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $department = $this->department->all();
        return view('admin.department.index',compact('department'));
    }

    public function create()
    {
        abort_if(Gate::denies("department_create"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        return view('admin.department.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $this->department->create($request->all());
        return redirect()->route('admin.department.index')->with('message' ,'Department Create Successfuly!');
    }

    public function show($id)
    {
        abort_if(Gate::denies("department_show"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $department = $this->department->findOrFail($id);
        return view('admin.department.show',compact('department'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies("department_edit"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $department = $this->department->findOrFail($id);
        return view('admin.department.edit',compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, $id)
    {
        $department = $this->department->findOrFail($id);
        $department->update($request->all());
        return redirect()->route('admin.department.index')->with('message' ,'Department Update Successfuly!');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies("department_delete"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $department = $this->department->findOrFail($id);
        $department->delete();
        return redirect()->route('admin.department.index')->with('message' ,'Department Delete Successfuly!');
    }
    public function massDestroy(MassDestroyDepartmentRequest $request)
    {
        Department::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
