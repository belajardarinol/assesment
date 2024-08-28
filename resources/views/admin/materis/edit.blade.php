@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.materi.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.materis.update', [$materi->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="sub_bab_id">{{ trans('cruds.materi.fields.sub_bab') }}</label>
                    <select class="form-control select2 {{ $errors->has('sub_bab') ? 'is-invalid' : '' }}" name="sub_bab_id"
                        id="sub_bab_id">
                        @foreach ($sub_babs as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('sub_bab_id') ? old('sub_bab_id') : $materi->sub_bab->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sub_bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sub_bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.materi.fields.sub_bab_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="keterampilan_apoteker">{{ trans('cruds.materi.fields.keterampilan_apoteker') }}</label>
                    <input class="form-control {{ $errors->has('keterampilan_apoteker') ? 'is-invalid' : '' }}"
                        type="text" name="keterampilan_apoteker" id="keterampilan_apoteker"
                        value="{{ old('keterampilan_apoteker', $materi->keterampilan_apoteker) }}">
                    @if ($errors->has('keterampilan_apoteker'))
                        <div class="invalid-feedback">
                            {{ $errors->first('keterampilan_apoteker') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.materi.fields.keterampilan_apoteker_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="kode">{{ trans('cruds.materi.fields.kode') }}</label>
                    <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text"
                        name="kode" id="kode" value="{{ old('kode', $materi->kode) }}">
                    @if ($errors->has('kode'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kode') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.materi.fields.kode_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="klasifikasis">{{ trans('cruds.materi.fields.klasifikasi') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('klasifikasis') ? 'is-invalid' : '' }}"
                        name="klasifikasis[]" id="klasifikasis" multiple>
                        @php $klasifikasis = App\Models\Klasifikasi::all(); @endphp
                        @foreach ($klasifikasis as $klasifikasi)
                            <option value="{{ $klasifikasi->id }}"
                                {{ in_array($id, old('klasifikasis', [])) || $materi->klasifikasis->contains($id) ? 'selected' : '' }}>
                                {{ $klasifikasi->klasifikasi }} | {{ $klasifikasi->subkategori }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('klasifikasis'))
                        <div class="invalid-feedback">
                            {{ $errors->first('klasifikasis') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.materi.fields.klasifikasi_helper') }}</span>
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
