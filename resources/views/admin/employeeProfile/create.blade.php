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
                            <select name="employee_code" id="" class="form-select">
                                <option value="">Please Choose Employee</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="emp_code">Employee Code</label>
                            <input class="form-control" type="text"
                                name="emp_code" id="emp_code" value="" >
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
