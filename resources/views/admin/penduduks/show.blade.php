@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penduduk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penduduks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.id') }}
                        </th>
                        <td>
                            {{ $penduduk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.nama') }}
                        </th>
                        <td>
                            {{ $penduduk->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.nik') }}
                        </th>
                        <td>
                            {{ $penduduk->nik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.jenis_kelamin') }}
                        </th>
                        <td>
                            {{ App\Models\Penduduk::JENIS_KELAMIN_RADIO[$penduduk->jenis_kelamin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.tanggal_lahir') }}
                        </th>
                        <td>
                            {{ $penduduk->tanggal_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.alamat') }}
                        </th>
                        <td>
                            {!! $penduduk->alamat !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.provinsi') }}
                        </th>
                        <td>
                            {{ $penduduk->provinsi->nama_provinsi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penduduk.fields.kabupaten') }}
                        </th>
                        <td>
                            {{ $penduduk->kabupaten->nama_kabupaten ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penduduks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection