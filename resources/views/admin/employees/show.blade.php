@extends('layouts.admin')
@section('content')

<div class="card">
    <h6 class="font-weight-bold card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
    </h6>
    {{-- <div class="card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
    </div> --}}

    <div class="card-body">
        <div class="form-group">
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.id') }}
                        </th>
                        <td>
                            {{ $employees->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee.fields.name') }}</th>
                        <td>{{ $employees->name }}</td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employee.fields.email') }}
                        </th>
                        <td>{{ $employees->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee.fields.address') }}</th>
                        <td>{{ $employees->address }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.employee.fields.department') }}</th>
                        <td>{{ $employees->department_id }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
