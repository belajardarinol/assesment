@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.transactionDetail.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.transaction-details.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.transactionDetail.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionDetail.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="value_idr">{{ trans('cruds.transactionDetail.fields.value_idr') }}</label>
                    <input class="form-control {{ $errors->has('value_idr') ? 'is-invalid' : '' }}" type="number"
                        name="value_idr" id="value_idr" value="{{ old('value_idr', '') }}" step="0.01" required>
                    @if ($errors->has('value_idr'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value_idr') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionDetail.fields.value_idr_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="transactions">{{ trans('cruds.transactionDetail.fields.transaction') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('transactions') ? 'is-invalid' : '' }}"
                        name="transactions[]" id="transactions" multiple>
                        @foreach ($transactions as $id => $transaction)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('transactions', [])) ? 'selected' : '' }}>{{ $transaction }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('transactions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('transactions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionDetail.fields.transaction_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
