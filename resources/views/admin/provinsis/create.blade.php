@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.provinsi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.provinsis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_provinsi">{{ trans('cruds.provinsi.fields.nama_provinsi') }}</label>
                <input class="form-control {{ $errors->has('nama_provinsi') ? 'is-invalid' : '' }}" type="text" name="nama_provinsi" id="nama_provinsi" value="{{ old('nama_provinsi', '') }}" required>
                @if($errors->has('nama_provinsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_provinsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.provinsi.fields.nama_provinsi_helper') }}</span>
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