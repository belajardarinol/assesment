<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKelaRequest;
use App\Http\Requests\StoreKelaRequest;
use App\Http\Requests\UpdateKelaRequest;
use App\Models\Kela;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KelasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kela_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelas = Kela::all();

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        abort_if(Gate::denies('kela_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelas.create');
    }

    public function store(StoreKelaRequest $request)
    {
        $kela = Kela::create($request->all());

        return redirect()->route('admin.kelas.index');
    }

    public function edit(Kela $kela)
    {
        abort_if(Gate::denies('kela_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelas.edit', compact('kela'));
    }

    public function update(UpdateKelaRequest $request, Kela $kela)
    {
        $kela->update($request->all());

        return redirect()->route('admin.kelas.index');
    }

    public function show(Kela $kela)
    {
        abort_if(Gate::denies('kela_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kela->load('kelasUsers');

        return view('admin.kelas.show', compact('kela'));
    }

    public function destroy(Kela $kela)
    {
        abort_if(Gate::denies('kela_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kela->delete();

        return back();
    }

    public function massDestroy(MassDestroyKelaRequest $request)
    {
        $kelas = Kela::find(request('ids'));

        foreach ($kelas as $kela) {
            $kela->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}