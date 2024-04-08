<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmployeeProfileRequest;
use App\Http\Requests\StoreEmployeeProfileRequest;
use App\Http\Requests\UpdateEmployeeProfileRequest;
use App\Models\EmployeeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeProfileController extends Controller
{
    protected $employee_profiles;
    public function __construct(EmployeeProfile $employee_profiles)
    {
        $this->employee_profiles = $employee_profiles;
    }
    public function index()
    {
        abort_if(Gate::denies("employee_profiles_access"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->all();
        return view('admin.employeeProfile.index',compact('employee_profiles'));
    }

    public function create()
    {
        abort_if(Gate::denies("employee_profiles_create"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        return view('admin.employeeProfile.create');
    }

    public function store(StoreEmployeeProfileRequest $request)
    {
        $this->employee_profiles->create($request->all());
        return redirect()->route('admin.employee-profile.index')->with('message' ,'Employee Profile Create Successfuly!');
    }

    public function show($id)
    {
        abort_if(Gate::denies("employee_profiles_show"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        return view('admin.employeeProfile.show',compact('employee_profiles'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies("employee_profiles_edit"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        return view('admin.employeeProfile.edit',compact('employee_profiles'));
    }

    public function update(UpdateEmployeeProfileRequest $request, $id)
    {
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        $employee_profiles->update($request->all());
        return redirect()->route('admin.employee-profile.index')->with('message' ,'Employee Profile Update Successfuly!');
    }

    public function trashList()
    {
        abort_if(Gate::denies("employee_profiles_trashList"), Response::HTTP_FORBIDDEN, "403 Forbidden");
        $employee_profiles = $this->employee_profiles->onlyTrashed()->get();
        return view('admin.employeeProfile.trashList', compact('employee_profiles'));
    }

    public function restoreTrash($id)
    {
        $employee_profiles = $this->employee_profiles->withTrashed()->find($id)->restore();
        return redirect()->route('admin.employee-profile.index')->with('message' , 'Employee Profile Restore Successfully!');
    }
    public function trashDelete($id)
    {
        $employee_profiles = $this->employee_profiles->withTrashed()->find($id);

        if ($employee_profiles) {
            $employee_profiles->forceDelete();
                return redirect()->route('admin.employee-profile.trashList')->with('message',"Trash Data Delete Successfully!");
        } else {
            return redirect()->route('admin.employee-profile.trashList')->with("message","Fail");
        }
    }

    public function destroy($id)
    {
        abort_if(Gate::denies("employee_profiles_delete"), Response::HTTP_FORBIDDEN,"403 Forbidden");
        $employee_profiles = $this->employee_profiles->findOrFail($id);
        $employee_profiles->delete();
        return redirect()->route('admin.employee-profile.index')->with('message' ,'Employee Profile Delete Successfuly!');
    }
    public function massDestroy(MassDestroyEmployeeProfileRequest $request)
    {
        EmployeeProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
