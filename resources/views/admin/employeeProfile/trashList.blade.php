@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
           <h5 class=" font-weight-bold "> Employee Profile List </h5>
           <div style="margin-bottom: 10px;" class="row">
               <div class="col-lg-12">
                   <a class="btn btn-secondary" href="{{ route('admin.employee-profile.index') }}">
                    {{ trans('cruds.employee_profile.fields.back') }}
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
                            <th>Email</th>
                            <th>Address</th>
                            <th>Employee</th>
                            <th>Employee Code</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($employee_profiles as $employee_profile)
                           <tr>
                            <td>{{$loop->iteration}}</td>
                                <td>{{$employee_profile->name}}</td>
                                <td>
                                    @can('employee_profiles_show')
                                    <a class="p-0 glow btn btn-primary text-white"
                                        onclick="return confirm('Are you Sure Restore?')"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="view" href="{{ route('admin.employee_profiles.restore.trash', $employee_profile->id) }}">
                                        Restore
                                    </a>
                                @endcan
                                @can('employee_profiles_delete')
                                    <form id="orderDelete-{{ $employee_profile->id }}"
                                        action="{{ route('admin.employee-profile.trashDelete', $employee_profile->id) }}" method="POST"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden"
                                            style="width: 60px;display: inline-block;line-height: 36px;"
                                            class=" p-0 glow" value="{{ trans('global.delete') }}">
                                        <button
                                            style="width: 60px;display: inline-block;line-height: 36px;border:none;"
                                            class=" p-0 glow btn btn-danger text-white" title="delete"
                                            onclick="return confirm('{{ trans('global.areYouSure') }}');">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                                </td>
                           </tr>
                       @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
