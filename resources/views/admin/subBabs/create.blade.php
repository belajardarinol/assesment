@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.subBab.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.sub-babs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="bab_id">{{ trans('cruds.subBab.fields.bab') }}</label>
                    <select class="form-control select2 {{ $errors->has('bab') ? 'is-invalid' : '' }}" name="bab_id"
                        id="bab_id">
                        @foreach ($babs as $id => $entry)
                            <option value="{{ $id }}" {{ old('bab_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.subBab.fields.bab_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="judul_sub_bab">{{ trans('cruds.subBab.fields.judul_sub_bab') }}</label>
                    <input class="form-control {{ $errors->has('judul_sub_bab') ? 'is-invalid' : '' }}" type="text"
                        name="judul_sub_bab" id="judul_sub_bab" value="{{ old('judul_sub_bab', '') }}">
                    @if ($errors->has('judul_sub_bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('judul_sub_bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.subBab.fields.judul_sub_bab_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="sub_bab">{{ trans('cruds.subBab.fields.sub_bab') }}</label>
                    <input class="form-control {{ $errors->has('sub_bab') ? 'is-invalid' : '' }}" type="text"
                        name="sub_bab" id="sub_bab" value="{{ old('sub_bab', '') }}">
                    @if ($errors->has('sub_bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sub_bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.subBab.fields.sub_bab_helper') }}</span>
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
