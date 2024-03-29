@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
           <h5 class=" font-weight-bold "> Employee List </h5>
            {{-- @can('employee_create') --}}
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.employees.create') }}">
                            Add Employee
                        </a>
                    </div>
                </div>
            {{-- @endcan --}}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone_no }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>
                                    {{-- Add action buttons here --}}
                                    {{-- Example:
                                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
