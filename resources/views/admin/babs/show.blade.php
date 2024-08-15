@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.bab.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.babs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.bab.fields.id') }}
                            </th>
                            <td>
                                {{ $bab->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bab.fields.judul_bab') }}
                            </th>
                            <td>
                                {{ $bab->judul_bab }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.babs.index') }}">
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
                <a class="nav-link" href="#bab_sub_babs" role="tab" data-toggle="tab">
                    {{ trans('cruds.subBab.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="bab_sub_babs">
                @includeIf('admin.babs.relationships.babSubBabs', ['subBabs' => $bab->babSubBabs])
            </div>
        </div>
    </div>
@endsection
