@can('transaction_header_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transaction-headers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transactionHeader.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.transactionHeader.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-categoryTransactionHeaders">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.rate_euro') }}
                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.date_paid') }}
                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.transaction_detail') }}
                        </th>
                        <th>
                            {{ trans('cruds.transactionHeader.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactionHeaders as $key => $transactionHeader)
                        <tr data-entry-id="{{ $transactionHeader->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transactionHeader->id ?? '' }}
                            </td>
                            <td>
                                {{ $transactionHeader->description ?? '' }}
                            </td>
                            <td>
                                {{ $transactionHeader->code ?? '' }}
                            </td>
                            <td>
                                {{ $transactionHeader->rate_euro ?? '' }}
                            </td>
                            <td>
                                {{ $transactionHeader->date_paid ?? '' }}
                            </td>
                            <td>
                                @foreach($transactionHeader->transaction_details as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $transactionHeader->category->name ?? '' }}
                            </td>
                            <td>
                                @can('transaction_header_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transaction-headers.show', $transactionHeader->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transaction_header_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transaction-headers.edit', $transactionHeader->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transaction_header_delete')
                                    <form action="{{ route('admin.transaction-headers.destroy', $transactionHeader->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaction_header_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transaction-headers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-categoryTransactionHeaders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
