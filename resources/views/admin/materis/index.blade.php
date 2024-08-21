@extends('layouts.admin')
@section('content')
    @can('materi_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.materis.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.materi.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', [
                    'model' => 'Materi',
                    'route' => 'admin.materis.parseCsvImport',
                ])
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.materi.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Materi">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.materi.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.materi.fields.sub_bab') }}
                            </th>
                            <th>
                                {{ trans('cruds.materi.fields.keterampilan_apoteker') }}
                            </th>
                            <th>
                                {{ trans('cruds.materi.fields.kode') }}
                            </th>
                            <th>
                                {{ trans('cruds.materi.fields.klasifikasi') }}
                            </th>
                            <th>
                                Sub-Katagori
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $key => $materi)
                            <tr data-entry-id="{{ $materi->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $materi->id ?? '' }}
                                </td>
                                <td>
                                    {{ $materi->sub_bab->judul_sub_bab ?? '' }}
                                </td>
                                <td>
                                    {{ $materi->keterampilan_apoteker ?? '' }}
                                </td>
                                <td>
                                    {{ $materi->kode ?? '' }}
                                </td>
                                <td>
                                    @foreach ($materi->klasifikasis as $key => $item)
                                        <span class="badge badge-info">{{ $item->klasifikasi }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($materi->klasifikasis as $key => $item)
                                        <span class="badge badge-info">{{ $item->subkategori }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('materi_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.materis.show', $materi->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('materi_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.materis.edit', $materi->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('materi_delete')
                                        <form action="{{ route('admin.materis.destroy', $materi->id) }}" method="POST"
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
            @can('materi_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.materis.massDestroy') }}",
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
            let table = $('.datatable-Materi:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
