@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.kela.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.kelas.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.kela.fields.id') }}
                            </th>
                            <td>
                                {{ $kela->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kela.fields.name') }}
                            </th>
                            <td>
                                {{ $kela->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.kelas.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#kelas_users" role="tab" data-toggle="tab">
                    {{ trans('cruds.user.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="kelas_users">
                @includeIf('admin.kelas.relationships.kelasUsers', ['users' => $kela->kelasUsers])
            </div>
        </div>
    </div>
@endsection
