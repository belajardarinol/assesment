@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.cpl.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cpls.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.cpl.fields.id') }}
                            </th>
                            <td>
                                {{ $cpl->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cpl.fields.name') }}
                            </th>
                            <td>
                                {{ $cpl->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cpl.fields.value') }}
                            </th>
                            <td>
                                {{ $cpl->value }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cpls.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
