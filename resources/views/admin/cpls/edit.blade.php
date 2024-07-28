@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.cpl.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.cpls.update', [$cpl->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.cpl.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $cpl->name) }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cpl.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="value">{{ trans('cruds.cpl.fields.value') }}</label>
                    <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number"
                        name="value" id="value" value="{{ old('value', $cpl->value) }}" step="1">
                    @if ($errors->has('value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cpl.fields.value_helper') }}</span>
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
