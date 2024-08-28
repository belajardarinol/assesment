<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Models\Materi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles', 'team'])->get();

        return view('admin.users.index', compact('users'));
    }

    public function reset()
    {
        $materi = Materi::withTrashed()->limit(28)->get();
        foreach ($materi as $key => $value) {
            $value->update(['deleted_at' => null]);
        }
        return redirect()->route('admin.home');
    }

    public function masuk($id)
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $teams = Team::with(['owner'])->get();
        $user = User::find($id);

        $admin = User::find(auth()->user()->id);
        $admin->update(['team_id' => $user->team_id]);
        $admin->update(['temp_id' => $user->id]);
        $admin->update(['temp_status' => 1]);
        $admin->roles()->sync(2);
        // return view('home');
        return redirect()->route('admin.home');
    }

    public function kembali()
    {
        // echo 111;
        // die;
        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $teams = Team::with(['owner'])->get();
        // var_dump(auth()->user()->id);
        // die;
        $update_team = User::find(1);
        $update_team->update(['team_id' => null]);
        $update_team->update(['temp_id' => null]);
        $update_team->update(['temp_status' => 0]);
        $update_team->roles()->sync(1);

        $user = \App\Models\User::find(1);
        // var_dump($user);
        Auth::login($user);
        // return view('home');
        // redirect()->route('admin.home');
        return redirect()->route('admin.home');
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles', 'teams'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'team');

        return view('admin.users.edit', compact('roles', 'teams', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'team', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        $users = User::find(request('ids'));

        foreach ($users as $user) {
            $user->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
