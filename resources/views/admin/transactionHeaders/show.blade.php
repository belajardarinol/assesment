@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.transactionHeader.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.transaction-headers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.id') }}
                            </th>
                            <td>
                                {{ $transactionHeader->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.description') }}
                            </th>
                            <td>
                                {{ $transactionHeader->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.code') }}
                            </th>
                            <td>
                                {{ $transactionHeader->code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.rate_euro') }}
                            </th>
                            <td>
                                {{ $transactionHeader->rate_euro }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.date_paid') }}
                            </th>
                            <td>
                                {{ $transactionHeader->date_paid }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.transaction_detail') }}
                            </th>
                            <td>
                                @foreach ($transactionHeader->transaction_details as $key => $transaction_detail)
                                    <span class="label label-info">{{ $transaction_detail->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transactionHeader.fields.category') }}
                            </th>
                            <td>
                                {{ $transactionHeader->category->name ?? '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.transaction-headers.index') }}">
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
                <a class="nav-link" href="#transaction_transaction_details" role="tab" data-toggle="tab">
                    {{ trans('cruds.transactionDetail.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="transaction_transaction_details">
                @includeIf('admin.transactionHeaders.relationships.transactionTransactionDetails', [
                    'transactionDetails' => $transactionHeader->transactionTransactionDetails,
                ])
            </div>
        </div>
    </div>
@endsection
