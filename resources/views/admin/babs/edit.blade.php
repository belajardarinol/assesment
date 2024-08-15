@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.bab.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.babs.update', [$bab->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="judul_bab">{{ trans('cruds.bab.fields.judul_bab') }}</label>
                    <input class="form-control {{ $errors->has('judul_bab') ? 'is-invalid' : '' }}" type="text"
                        name="judul_bab" id="judul_bab" value="{{ old('judul_bab', $bab->judul_bab) }}">
                    @if ($errors->has('judul_bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('judul_bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bab.fields.judul_bab_helper') }}</span>
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
