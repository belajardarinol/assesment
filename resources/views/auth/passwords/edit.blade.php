@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.my_profile') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.password.updateProfile') }}">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nidn">{{ trans('cruds.user.fields.nidn') }}</label>
                            <input class="form-control {{ $errors->has('nidn') ? 'is-invalid' : '' }}" type="text"
                                name="nidn" id="nidn" value="{{ old('nidn', $user->nidn) }}">
                            @if ($errors->has('nidn'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nidn') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.nidn_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nim">{{ trans('cruds.user.fields.nim') }}</label>
                            <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" type="text"
                                name="nim" id="nim" value="{{ old('nim', $user->nim) }}">
                            @if ($errors->has('nim'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nim') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.nim_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">{{ trans('cruds.user.fields.kelas') }}</label>
                            {{-- {{ auth()->user()->kelas->nama_kelas }} --}}
                            <select class="form-control select2 {{ $errors->has('kelas') ? 'is-invalid' : '' }}"
                                name="kelas_id" id="kelas_id">
                                @foreach ($kelas as $id => $entry)
                                    <option value="{{ $id }}"
                                        {{ (old('kelas_id') ? old('kelas_id') : $user->kelas->id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $entry }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kelas'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kelas') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.kelas_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.change_password') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">New {{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" id="password" required>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">Repeat New
                                {{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password_confirmation"
                                id="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.delete_account') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.password.destroyProfile') }}"
                        onsubmit="return prompt('{{ __('global.delete_account_warning') }}') == '{{ auth()->user()->email }}'">
                        @csrf
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.delete') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (Route::has('profile.password.toggleTwoFactor'))
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ trans('global.two_factor.title') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.password.toggleTwoFactor') }}">
                            @csrf
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ auth()->user()->two_factor ? trans('global.two_factor.disable') : trans('global.two_factor.enable') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
