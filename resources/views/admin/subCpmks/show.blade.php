@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.subCpmk.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.sub-cpmks.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.subCpmk.fields.id') }}
                            </th>
                            <td>
                                {{ $subCpmk->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subCpmk.fields.name') }}
                            </th>
                            <td>
                                {{ $subCpmk->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subCpmk.fields.value') }}
                            </th>
                            <td>
                                {{ $subCpmk->value }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.sub-cpmks.index') }}">
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
                <a class="nav-link" href="#sub_cpmk_cpmks" role="tab" data-toggle="tab">
                    {{ trans('cruds.cpmk.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="sub_cpmk_cpmks">
                @includeIf('admin.subCpmks.relationships.subCpmkCpmks', ['cpmks' => $subCpmk->subCpmkCpmks])
            </div>
        </div>
    </div>
@endsection
