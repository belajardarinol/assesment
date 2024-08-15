@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.klasifikasi.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.klasifikasis.update', [$klasifikasi->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="kode_klasifikasi">{{ trans('cruds.klasifikasi.fields.kode_klasifikasi') }}</label>
                    <input class="form-control {{ $errors->has('kode_klasifikasi') ? 'is-invalid' : '' }}" type="text"
                        name="kode_klasifikasi" id="kode_klasifikasi"
                        value="{{ old('kode_klasifikasi', $klasifikasi->kode_klasifikasi) }}">
                    @if ($errors->has('kode_klasifikasi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kode_klasifikasi') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.klasifikasi.fields.kode_klasifikasi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="klasifikasi">{{ trans('cruds.klasifikasi.fields.klasifikasi') }}</label>
                    <input class="form-control {{ $errors->has('klasifikasi') ? 'is-invalid' : '' }}" type="text"
                        name="klasifikasi" id="klasifikasi" value="{{ old('klasifikasi', $klasifikasi->klasifikasi) }}">
                    @if ($errors->has('klasifikasi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('klasifikasi') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.klasifikasi.fields.klasifikasi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="keterangan">{{ trans('cruds.klasifikasi.fields.keterangan') }}</label>
                    <textarea class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                    @if ($errors->has('keterangan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('keterangan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.klasifikasi.fields.keterangan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="kode_subkategori">{{ trans('cruds.klasifikasi.fields.kode_subkategori') }}</label>
                    <input class="form-control {{ $errors->has('kode_subkategori') ? 'is-invalid' : '' }}" type="text"
                        name="kode_subkategori" id="kode_subkategori"
                        value="{{ old('kode_subkategori', $klasifikasi->kode_subkategori) }}">
                    @if ($errors->has('kode_subkategori'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kode_subkategori') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.klasifikasi.fields.kode_subkategori_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="subkategori">{{ trans('cruds.klasifikasi.fields.subkategori') }}</label>
                    <input class="form-control {{ $errors->has('subkategori') ? 'is-invalid' : '' }}" type="text"
                        name="subkategori" id="subkategori" value="{{ old('subkategori', $klasifikasi->subkategori) }}">
                    @if ($errors->has('subkategori'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subkategori') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.klasifikasi.fields.subkategori_helper') }}</span>
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
