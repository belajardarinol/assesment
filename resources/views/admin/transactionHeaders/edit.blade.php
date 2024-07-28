@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.transactionHeader.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.transaction-headers.update', [$transactionHeader->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="description">{{ trans('cruds.transactionHeader.fields.description') }}</label>
                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                        name="description" id="description"
                        value="{{ old('description', $transactionHeader->description) }}">
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionHeader.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="code">{{ trans('cruds.transactionHeader.fields.code') }}</label>
                    <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code"
                        id="code" value="{{ old('code', $transactionHeader->code) }}">
                    @if ($errors->has('code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionHeader.fields.code_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="rate_euro">{{ trans('cruds.transactionHeader.fields.rate_euro') }}</label>
                    <input class="form-control {{ $errors->has('rate_euro') ? 'is-invalid' : '' }}" type="number"
                        name="rate_euro" id="rate_euro" value="{{ old('rate_euro', $transactionHeader->rate_euro) }}"
                        step="0.01">
                    @if ($errors->has('rate_euro'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rate_euro') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionHeader.fields.rate_euro_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="date_paid">{{ trans('cruds.transactionHeader.fields.date_paid') }}</label>
                    <input class="form-control date {{ $errors->has('date_paid') ? 'is-invalid' : '' }}" type="text"
                        name="date_paid" id="date_paid" value="{{ old('date_paid', $transactionHeader->date_paid) }}"
                        required>
                    @if ($errors->has('date_paid'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date_paid') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transactionHeader.fields.date_paid_helper') }}</span>
                </div>

                <div id="transaction-details">
                    <h3>Transaction Details</h3>
                    @foreach ($transactionHeader->transaction_details as $index => $detail)
                        <div class="transaction-detail mb-3" data-index="{{ $index }}">
                            <label for="category-{{ $index }}">Category</label>
                            <select class="form-control" id="category-{{ $index }}"
                                name="details[{{ $index }}][category]">
                                <option value="income" {{ $detail->category == 'income' ? 'selected' : '' }}>Income
                                </option>
                                <option value="expense" {{ $detail->category == 'expense' ? 'selected' : '' }}>Expense
                                </option>
                            </select>
                            <label for="name-{{ $index }}">Name</label>
                            <input type="text" class="form-control" id="name-{{ $index }}"
                                name="details[{{ $index }}][name]" value="{{ $detail->name }}" required>
                            <label for="amount-{{ $index }}">Amount (IDR)</label>
                            <input type="number" class="form-control" id="amount-{{ $index }}"
                                name="details[{{ $index }}][amount]" value="{{ $detail->amount }}" required>
                            <button type="button" class="btn btn-danger remove-detail">Remove</button>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-primary mb-2" id="add-detail">Add Detail</button>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Template for new transaction details -->
    <div id="detail-template" style="display: none;">
        <div class="transaction-detail mb-3">
            <label for="category-TEMPLATE_INDEX">Category</label>
            <select class="form-control" id="category-TEMPLATE_INDEX" name="details[TEMPLATE_INDEX][category]">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="name-TEMPLATE_INDEX">Name</label>
            <input type="text" class="form-control" id="name-TEMPLATE_INDEX" name="details[TEMPLATE_INDEX][name]"
                required>
            <label for="amount-TEMPLATE_INDEX">Amount (IDR)</label>
            <input type="number" class="form-control" id="amount-TEMPLATE_INDEX" name="details[TEMPLATE_INDEX][amount]"
                required>
            <button type="button" class="btn btn-danger remove-detail">Remove</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let index = {{ $transactionHeader->transaction_details->count() }};
            $('#add-detail').on('click', function() {
                let template = $('#detail-template').html().replace(/TEMPLATE_INDEX/g, index);
                $('#transaction-details').append(template);
                index++;
            });

            $(document).on('click', '.remove-detail', function() {
                $(this).parent().remove();
            });
        });
    </script>
@endsection
