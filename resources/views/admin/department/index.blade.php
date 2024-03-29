@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
           <h5 class=" font-weight-bold "> Department List </h5>
                
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Department Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($departments as $department)
                           <tr>
                            <td>{{$loop->iteration}}</td>
                                <td>{{$department->name}}</td>
                                <td></td>
                           </tr>
                       @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
