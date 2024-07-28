@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.indikator.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.indikators.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.indikator.fields.id') }}
                            </th>
                            <td>
                                {{ $indikator->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.indikator.fields.name') }}
                            </th>
                            <td>
                                {{ $indikator->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.indikator.fields.value') }}
                            </th>
                            <td>
                                {{ $indikator->value }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.indikators.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
