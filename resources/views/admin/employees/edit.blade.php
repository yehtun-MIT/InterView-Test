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
        <h5 class="card-header font-weight-bold mb-4"> {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}</h5>
        {{-- <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
        </div> --}}

        <div class="card-body">
            <form method="POST" action="{{ route('admin.employees.update',$employees->id) }}" enctype="multipart/form-data" id="myForm">
                @csrf
                @method('PUT')
                <div class="row d-flex flex-warp">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.employee.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', $employees->name) }}" required>
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
                            <label class="required" for="email">{{ trans('cruds.employee.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                name="email" id="email" value="{{ old('email', $employees->email) }}" required>
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
                            <label class="required" for="address">{{ trans('cruds.employee.fields.address') }}</label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                                name="address" id="address" value="{{ old('address', $employees->address) }}" required>
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
                            <label class="required" for="department_id">{{ trans('cruds.employee.fields.department') }}</label>
                            <input class="form-control {{ $errors->has('department_id') ? 'is-invalid' : '' }}" type="text"
                                name="department_id" id="department_id" value="{{ old('department_id', $employees->department_id) }}" required>
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
                    '{{ trans('cruds.employee.fields.name') }} {{ trans('global.must_be_filled') }}');
            } else {
                $('#myForm').submit();
            }
        }
    </script>
@endsection
