@extends('layouts.admin')
@section('content')

<div class="card">
    <h6 class="font-weight-bold card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.employee_profile.title') }}
    </h6>
    {{-- <div class="card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.employee_profile.title') }}
    </div> --}}

    <div class="card-body">
        <div class="form-group">
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-profile.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employee_profile.fields.id') }}
                        </th>
                        <td>
                            {{ $employee_profiles->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee_profile.fields.name') }}</th>
                        <td>{{ $employee_profiles->employee->name }}</td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee_profile.fields.email') }}
                        </th>
                        <td>{{ $employee_profiles->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee_profile.fields.address') }}</th>
                        <td>{{ $employee_profiles->address }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee_profile.fields.emp_code') }}</th>
                        <td>{{ $employee_profiles->emp_code }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee_profile.fields.department') }}</th>
                        <td>{{ $employee_profiles->department->name }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.employee-profile.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
