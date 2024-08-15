@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.materi.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.materis.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.materi.fields.id') }}
                            </th>
                            <td>
                                {{ $materi->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materi.fields.sub_bab') }}
                            </th>
                            <td>
                                {{ $materi->sub_bab->judul_sub_bab ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materi.fields.keterampilan_apoteker') }}
                            </th>
                            <td>
                                {{ $materi->keterampilan_apoteker }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materi.fields.kode') }}
                            </th>
                            <td>
                                {{ $materi->kode }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materi.fields.klasifikasi') }}
                            </th>
                            <td>
                                @foreach ($materi->klasifikasis as $key => $klasifikasi)
                                    <span class="label label-info">{{ $klasifikasi->klasifikasi }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.materis.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
