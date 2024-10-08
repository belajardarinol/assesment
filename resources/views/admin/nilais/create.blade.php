@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.nilai.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.nilais.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.nilai.fields.name') }}</label>
                    {{-- <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}"> --}}
                    <select name="user_id" id="user" class="form-control">
                        @php
                            if (Auth::user()->roles->first()->id == 2) {
                                $users = App\Models\User::where('id', Auth::id())->get();
                            } else {
                                $users = App\Models\User::all();
                            }
                            if (Auth::user()->roles->first()->id == 3) {
                                $users = App\Models\User::where('team_id', Auth::user()->team_id)->get();
                            }
                        @endphp
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.nilai.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="value">Materi</label>
                    <select name="materi_id" id="materi" class="form-control">
                        @php
                            $materis = App\Models\Materi::all();
                        @endphp
                        @foreach ($materis as $materi)
                            <option value="{{ $materi->id }}">{{ $materi->keterampilan_apoteker }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.nilai.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="value">{{ trans('cruds.nilai.fields.value') }}</label>
                    <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number"
                        name="value" id="value" value="{{ old('value', '') }}" step="1">
                    @if ($errors->has('value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.nilai.fields.value_helper') }}</span>
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
