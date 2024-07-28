@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.mataKuliah.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.mata-kuliahs.update', [$mataKuliah->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.mataKuliah.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $mataKuliah->name) }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.mataKuliah.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="sks">{{ trans('cruds.mataKuliah.fields.sks') }}</label>
                    <input class="form-control {{ $errors->has('sks') ? 'is-invalid' : '' }}" type="number" name="sks"
                        id="sks" value="{{ old('sks', $mataKuliah->sks) }}" step="1">
                    @if ($errors->has('sks'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sks') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.mataKuliah.fields.sks_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="jumlah_pertemuan">{{ trans('cruds.mataKuliah.fields.jumlah_pertemuan') }}</label>
                    <input class="form-control {{ $errors->has('jumlah_pertemuan') ? 'is-invalid' : '' }}" type="number"
                        name="jumlah_pertemuan" id="jumlah_pertemuan"
                        value="{{ old('jumlah_pertemuan', $mataKuliah->jumlah_pertemuan) }}" step="1">
                    @if ($errors->has('jumlah_pertemuan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('jumlah_pertemuan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.mataKuliah.fields.jumlah_pertemuan_helper') }}</span>
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
