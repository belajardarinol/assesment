@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.cpmk.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.cpmks.update', [$cpmk->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.cpmk.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $cpmk->name) }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cpmk.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="value">{{ trans('cruds.cpmk.fields.value') }}</label>
                    <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number"
                        name="value" id="value" value="{{ old('value', $cpmk->value) }}" step="1">
                    @if ($errors->has('value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cpmk.fields.value_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="sub_cpmks">{{ trans('cruds.cpmk.fields.sub_cpmk') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('sub_cpmks') ? 'is-invalid' : '' }}"
                        name="sub_cpmks[]" id="sub_cpmks" multiple>
                        @foreach ($sub_cpmks as $id => $sub_cpmk)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('sub_cpmks', [])) || $cpmk->sub_cpmks->contains($id) ? 'selected' : '' }}>
                                {{ $sub_cpmk }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sub_cpmks'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sub_cpmks') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cpmk.fields.sub_cpmk_helper') }}</span>
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
