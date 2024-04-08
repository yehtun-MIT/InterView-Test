@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
           <h5 class=" font-weight-bold "> Department List </h5>
           @can('department_create')
           <div style="margin-bottom: 10px;" class="row">
               <div class="col-lg-12">
                   <a class="btn btn-success" href="{{ route('admin.department.create') }}">
                       {{ trans('global.add') }} {{ trans('cruds.department.title_singular') }}
                   </a>
               </div>
           </div>
       @endcan
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
                       @foreach ($department as $department)
                           <tr>
                            <td>{{$loop->iteration}}</td>
                                <td>{{$department->name}}</td>
                                <td>

                                    @can('department_show')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" href="{{ route('admin.department.show', $department->id) }}">
                                            Show
                                        </a>
                                    @endcan

                                    @can('department_edit')
                                        <a class="p-0 glow btn btn-success text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="edit" href="{{ route('admin.department.edit', $department->id) }}">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('department_delete')
                                        <form id="orderDelete-{{ $department->id }}"
                                            action="{{ route('admin.department.destroy', $department->id) }}" method="POST"
                                            onsubmit=""
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
