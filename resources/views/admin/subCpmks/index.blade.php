@extends('layouts.admin')
@section('content')
    @can('sub_cpmk_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.sub-cpmks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.subCpmk.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.subCpmk.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-SubCpmk">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.subCpmk.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.subCpmk.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.subCpmk.fields.value') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCpmks as $key => $subCpmk)
                            <tr data-entry-id="{{ $subCpmk->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $subCpmk->id ?? '' }}
                                </td>
                                <td>
                                    {{ $subCpmk->name ?? '' }}
                                </td>
                                <td>
                                    {{ $subCpmk->value ?? '' }}
                                </td>
                                <td>
                                    @can('sub_cpmk_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.sub-cpmks.show', $subCpmk->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('sub_cpmk_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.sub-cpmks.edit', $subCpmk->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('sub_cpmk_delete')
                                        <form action="{{ route('admin.sub-cpmks.destroy', $subCpmk->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
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
            @can('sub_cpmk_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.sub-cpmks.massDestroy') }}",
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
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-SubCpmk:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
