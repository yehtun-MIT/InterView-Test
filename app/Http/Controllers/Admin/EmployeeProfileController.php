<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeProfileRequest;
use App\Http\Requests\UpdateEmployeeProfileRequest;
use App\Models\EmployeeProfile;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeProfileController extends Controller
{
    protected $employee_profiles;
    protected $employees;
    public function __construct(EmployeeProfile $employee_profiles, Employee $employees)
    {
        $this->employee_profiles = $employee_profiles;
        $this->employees = $employees;
    }
    public function index()
    {
        abort_if(Gate::denies("employee_profiles_access"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->with('employee')->get();
        return view('admin.employeeProfile.index',compact('employee_profiles'));
    }

    public function create()
    {
        abort_if(Gate::denies("employee_profiles_create"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->all();
        $employees = $this->employees->all()->pluck('name', 'id');
        return view('admin.employeeProfile.create', compact(['employee_profiles', 'employees']));
    }

    public function store(StoreEmployeeProfileRequest $request)
    {
        $this->employee_profiles->create($request->all());
        return redirect()->route('admin.employee-profile.index')->with('message' ,'Employee Profile Create Successfuly!');
    }

    public function show($id)
    {
        abort_if(Gate::denies("employee_profiles_show"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->with('employee')->findOrFail($id);
        return view('admin.employeeProfile.show',compact('employee_profiles'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies("employee_profiles_edit"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        $employees = $this->employees->all()->pluck('name' , 'id');
        return view('admin.employeeProfile.edit',compact('employee_profiles', 'employees'));
    }

    public function update(UpdateEmployeeProfileRequest $request, $id)
    {
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        $employee_profiles->update($request->all());
        return redirect()->route('admin.employee-profile.index')->with('message' ,'Employee Profile Update Successfuly!');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies("employee_profiles_delete"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        $employee_profiles->delete();
        return redirect()->route('admin.employee-profile.index')->with('message' ,'Employee Profile Delete Successfuly!');
    }
}
