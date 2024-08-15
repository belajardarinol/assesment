<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBabRequest;
use App\Http\Requests\Request;
use App\Http\Requests\UpdateBabRequest;
use App\Models\Bab;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BabController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $babs = Bab::all();

        return view('admin.babs.index', compact('babs'));
    }

    public function create()
    {
        abort_if(Gate::denies('bab_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.babs.create');
    }

    public function store(Request $request)
    {
        $bab = Bab::create($request->all());

        return redirect()->route('admin.babs.index');
    }

    public function edit(Bab $bab)
    {
        abort_if(Gate::denies('bab_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.babs.edit', compact('bab'));
    }

    public function update(Request $request, Bab $bab)
    {
        $bab->update($request->all());

        return redirect()->route('admin.babs.index');
    }

    public function show(Bab $bab)
    {
        abort_if(Gate::denies('bab_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bab->load('babSubBabs');

        return view('admin.babs.show', compact('bab'));
    }

    public function destroy(Bab $bab)
    {
        abort_if(Gate::denies('bab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bab->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $babs = Bab::find(request('ids'));

        foreach ($babs as $bab) {
            $bab->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
