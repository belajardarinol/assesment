@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.cpmk.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cpmks.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.cpmk.fields.id') }}
                            </th>
                            <td>
                                {{ $cpmk->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cpmk.fields.name') }}
                            </th>
                            <td>
                                {{ $cpmk->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cpmk.fields.value') }}
                            </th>
                            <td>
                                {{ $cpmk->value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cpmk.fields.sub_cpmk') }}
                            </th>
                            <td>
                                @foreach ($cpmk->sub_cpmks as $key => $sub_cpmk)
                                    <span class="label label-info">{{ $sub_cpmk->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cpmks.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
