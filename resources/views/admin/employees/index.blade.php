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
                <table class="table table-bordered table-striped table-hover datatable datatable-Permission">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{$employee->department_id}}</td>
                                <td>{{$employee->address}}</td>
                                <td>

                                    @can('employee_show')
                                        <a class="p-0 glow btn btn-primary text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="view" href="{{ route('admin.employees.show', $employee->id) }}">
                                            Show
                                        </a>
                                    @endcan

                                    @can('employee_edit')
                                        <a class="p-0 glow btn btn-success text-white"
                                            style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                            title="edit" href="{{ route('admin.employees.edit', $employee->id) }}">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('employee_delete')
                                        <form id="orderDelete-{{ $employee->id }}"
                                            action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST"
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
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('permission_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.permissions.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    //[1, 'desc']
                ],
                pageLength: 100,
                bPaginate:true,
                info:false,
            });
            let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
