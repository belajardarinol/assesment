@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.transactionDetail.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.transaction-details.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $transactionDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionDetail.fields.name') }}
                            </th>
                            <td>
                                {{ $transactionDetail->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionDetail.fields.value_idr') }}
                            </th>
                            <td>
                                {{ $transactionDetail->value_idr }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionDetail.fields.transaction') }}
                            </th>
                            <td>
                                @foreach ($transactionDetail->transactions as $key => $transaction)
                                    <span class="label label-info">{{ $transaction->description }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.transaction-details.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#transaction_detail_transaction_headers" role="tab" data-toggle="tab">
                    {{ trans('cruds.transactionHeader.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="transaction_detail_transaction_headers">
                @includeIf('admin.transactionDetails.relationships.transactionDetailTransactionHeaders', [
                    'transactionHeaders' => $transactionDetail->transactionDetailTransactionHeaders,
                ])
            </div>
        </div>
    </div>
@endsection
