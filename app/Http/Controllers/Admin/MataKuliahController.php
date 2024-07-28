<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMataKuliahRequest;
use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use App\Models\MataKuliah;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MataKuliahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mata_kuliah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mataKuliahs = MataKuliah::all();

        return view('admin.mataKuliahs.index', compact('mataKuliahs'));
    }

    public function create()
    {
        abort_if(Gate::denies('mata_kuliah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mataKuliahs.create');
    }

    public function store(StoreMataKuliahRequest $request)
    {
        $mataKuliah = MataKuliah::create($request->all());

        return redirect()->route('admin.mata-kuliahs.index');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        abort_if(Gate::denies('mata_kuliah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mataKuliahs.edit', compact('mataKuliah'));
    }

    public function update(UpdateMataKuliahRequest $request, MataKuliah $mataKuliah)
    {
        $mataKuliah->update($request->all());

        return redirect()->route('admin.mata-kuliahs.index');
    }

    public function show(MataKuliah $mataKuliah)
    {
        abort_if(Gate::denies('mata_kuliah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mataKuliahs.show', compact('mataKuliah'));
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        abort_if(Gate::denies('mata_kuliah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mataKuliah->delete();

        return back();
    }

    public function massDestroy(MassDestroyMataKuliahRequest $request)
    {
        $mataKuliahs = MataKuliah::find(request('ids'));

        foreach ($mataKuliahs as $mataKuliah) {
            $mataKuliah->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}