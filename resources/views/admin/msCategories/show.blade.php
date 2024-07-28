@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.msCategory.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.ms-categories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.msCategory.fields.id') }}
                            </th>
                            <td>
                                {{ $msCategory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.msCategory.fields.name') }}
                            </th>
                            <td>
                                {{ $msCategory->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.ms-categories.index') }}">
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
                <a class="nav-link" href="#category_transaction_headers" role="tab" data-toggle="tab">
                    {{ trans('cruds.transactionHeader.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="category_transaction_headers">
                @includeIf('admin.msCategories.relationships.categoryTransactionHeaders', [
                    'transactionHeaders' => $msCategory->categoryTransactionHeaders,
                ])
            </div>
        </div>
    </div>
@endsection
