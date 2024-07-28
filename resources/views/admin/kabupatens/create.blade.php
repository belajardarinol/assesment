@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kabupaten.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kabupatens.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="provinsi_id">{{ trans('cruds.kabupaten.fields.provinsi') }}</label>
                <select class="form-control select2 {{ $errors->has('provinsi') ? 'is-invalid' : '' }}" name="provinsi_id" id="provinsi_id" required>
                    @foreach($provinsis as $id => $entry)
                        <option value="{{ $id }}" {{ old('provinsi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('provinsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provinsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kabupaten.fields.provinsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_kabupaten">{{ trans('cruds.kabupaten.fields.nama_kabupaten') }}</label>
                <input class="form-control {{ $errors->has('nama_kabupaten') ? 'is-invalid' : '' }}" type="text" name="nama_kabupaten" id="nama_kabupaten" value="{{ old('nama_kabupaten', '') }}" required>
                @if($errors->has('nama_kabupaten'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_kabupaten') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kabupaten.fields.nama_kabupaten_helper') }}</span>
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