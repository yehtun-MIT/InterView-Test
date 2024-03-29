@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
           <h5 class=" font-weight-bold "> Employee List </h5>
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        {{-- Create Employee Profile  --}}
                        <a class="btn btn-success" href="{{ route('admin.employee-profile.create') }}">
                            Add Employee Profile
                        </a>
                    </div>
                </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee Name</th>
                            <th>Employee Code</th>                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
