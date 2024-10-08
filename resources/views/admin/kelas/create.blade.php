@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.kela.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.kelas.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_kelas">{{ trans('cruds.kela.fields.nama_kelas') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="nama_kelas" id="nama_kelas" value="{{ old('name', '') }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.kela.fields.nama_kelas_helper') }}</span>
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
