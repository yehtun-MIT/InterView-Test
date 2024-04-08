@extends('layouts.admin')
@section('styles')
    <style>
        .name_error {
            color: red;
            font-size: 13px;
            font-style: italic;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <h5 class="card-header font-weight-bold mb-4"> {{ trans('global.edit') }} {{ trans('cruds.employee_profile.title_singular') }}</h5>
        {{-- <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.employee_profiles.title_singular') }}
        </div> --}}

        <div class="card-body">
            <form method="POST" action="{{ route('admin.employee-profile.update',$employee_profiles->id) }}" enctype="multipart/form-data" id="myForm">
                @csrf
                @method('PUT')
                <div class="row d-flex flex-warp">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.employee_profile.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', $employee_profiles->name) }}" required>
                            <span class="name_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.employee_profile.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                name="email" id="email" value="{{ old('email', $employee_profiles->email) }}" required>
                            <span class="email_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.employee_profile.fields.address') }}</label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                                name="address" id="address" value="{{ old('address', $employee_profiles->address) }}" required>
                            <span class="address_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="employee_id">{{ trans('cruds.employee_profile.fields.employee') }}</label>
                            <input class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : '' }}" type="text"
                                name="employee_id" id="employee_id" value="{{ old('employee_id', $employee_profiles->employee_id) }}" required>
                            <span class="employee_id_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employee_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="emp_code">{{ trans('cruds.employee_profile.fields.emp_code') }}</label>
                            <input class="form-control {{ $errors->has('emp_code') ? 'is-invalid' : '' }}" type="text"
                                name="emp_code" id="emp_code" value="{{ old('emp_code', $employee_profiles->emp_code) }}" required>
                            <span class="emp_code_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emp_code') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="department_id">{{ trans('cruds.employee_profile.fields.department') }}</label>
                            <input class="form-control {{ $errors->has('department_id') ? 'is-invalid' : '' }}" type="text"
                                name="department_id" id="department_id" value="{{ old('department_id', $employee_profiles->department_id) }}" required>
                            <span class="department_id_error"></span>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex ">
                        <div class="form-group mt-2 mr-3">
                            <button class="btn btn-success" type="submit" id="save">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                        <div class="form-group mt-2 ms-2">
                            <a onclick=history.back() class="btn btn-secondary text-white">
                                {{ trans('global.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#save').on('click', function(e) {
            e.preventDefault();
            formValidation();
        })

        var formValidation = () => {
            let name = $('#name').val();

            if (name == '') {
                $('.name_error').html(
                    '{{ trans('cruds.department.fields.name') }} {{ trans('global.must_be_filled') }}');
            } else {
                $('#myForm').submit();
            }
        }
    </script>
@endsection
