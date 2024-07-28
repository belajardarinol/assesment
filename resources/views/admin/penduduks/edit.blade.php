@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.penduduk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.penduduks.update", [$penduduk->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.penduduk.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $penduduk->nama) }}" required>
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nik">{{ trans('cruds.penduduk.fields.nik') }}</label>
                <input class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" type="text" name="nik" id="nik" value="{{ old('nik', $penduduk->nik) }}" required>
                @if($errors->has('nik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nik') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.nik_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.penduduk.fields.jenis_kelamin') }}</label>
                @foreach(App\Models\Penduduk::JENIS_KELAMIN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="jenis_kelamin_{{ $key }}" name="jenis_kelamin" value="{{ $key }}" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jenis_kelamin_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('jenis_kelamin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_kelamin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.jenis_kelamin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_lahir">{{ trans('cruds.penduduk.fields.tanggal_lahir') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}" required>
                @if($errors->has('tanggal_lahir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_lahir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.tanggal_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.penduduk.fields.alamat') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{!! old('alamat', $penduduk->alamat) !!}</textarea>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="provinsi_id">{{ trans('cruds.penduduk.fields.provinsi') }}</label>
                <select class="form-control select2 {{ $errors->has('provinsi') ? 'is-invalid' : '' }}" name="provinsi_id" id="provinsi_id" required>
                    @foreach($provinsis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('provinsi_id') ? old('provinsi_id') : $penduduk->provinsi->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('provinsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provinsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.provinsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kabupaten_id">{{ trans('cruds.penduduk.fields.kabupaten') }}</label>
                <select class="form-control select2 {{ $errors->has('kabupaten') ? 'is-invalid' : '' }}" name="kabupaten_id" id="kabupaten_id" required>
                    @foreach($kabupatens as $id => $entry)
                        <option value="{{ $id }}" {{ (old('kabupaten_id') ? old('kabupaten_id') : $penduduk->kabupaten->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kabupaten'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kabupaten') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penduduk.fields.kabupaten_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.penduduks.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $penduduk->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection