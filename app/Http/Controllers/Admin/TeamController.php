<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::with(['owner'])->get();

        return view('admin.teams.index', compact('teams'));
    }

    public function masuk($id)
    {
        // abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $teams = Team::with(['owner'])->get();
        $update_team = User::find(auth()->user()->id);
        $update_team->update(['team_id' => auth()->user()->id]);
        $update_team->roles()->sync(3);
        // return view('home');
        return redirect()->route('admin.home');
    }

    public function kembali()
    {
        // abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $teams = Team::with(['owner'])->get();
        $update_team = User::find(auth()->user()->id);
        $update_team->update(['team_id' => null]);
        $update_team->roles()->sync(1);
        // return view('home');
        // redirect()->route('admin.home');
        return redirect()->route('admin.home');
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        $data             = $request->all();
        $data['owner_id'] = auth()->user()->id;
        $team             = Team::create($data);

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('owner');

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('owner');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        $teams = Team::find(request('ids'));

        foreach ($teams as $team) {
            $team->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
