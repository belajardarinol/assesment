@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.subBab.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.sub-babs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.subBab.fields.id') }}
                            </th>
                            <td>
                                {{ $subBab->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subBab.fields.bab') }}
                            </th>
                            <td>
                                {{ $subBab->bab->judul_bab ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subBab.fields.judul_sub_bab') }}
                            </th>
                            <td>
                                {{ $subBab->judul_sub_bab }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.sub-babs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
