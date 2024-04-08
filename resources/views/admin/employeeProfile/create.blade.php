@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} Employee Profile
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.employee-profile.store') }}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row mt-3">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="name">Employee Name</label>
                            <input class="form-control" type="text" name="name" id="name" value="">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="email">Email</label>
                            <input class="form-control" type="email"
                                name="email" id="email" value="" >
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="address">Address</label>
                            <input class="form-control" type="text"
                                name="address" id="address" value="" >
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="employee_id">Employee</label>
                            <input class="form-control" type="text"
                                name="employee_id" id="employee_id" value="" >
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="emp_code">Employee Code</label>
                            <input class="form-control" type="text"
                                name="emp_code" id="emp_code" value="" >
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="department">Department</label>
                            <input class="form-control" type="text"
                                name="department_id" id="department_id" value="" >
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                        <div class="form-group mt-2">
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
