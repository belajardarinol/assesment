<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNilaiRequest;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use App\Models\Nilai;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NilaiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nilai_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nilais = Nilai::all();

        return view('admin.nilais.index', compact('nilais'));
    }

    public function create()
    {
        abort_if(Gate::denies('nilai_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nilais.create');
    }

    public function store(StoreNilaiRequest $request)
    {
        $nilai = Nilai::create($request->all());

        return redirect()->route('admin.nilais.index');
    }

    public function edit(Nilai $nilai)
    {
        abort_if(Gate::denies('nilai_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nilais.edit', compact('nilai'));
    }

    public function update(UpdateNilaiRequest $request, Nilai $nilai)
    {
        $nilai->update($request->all());

        return redirect()->route('admin.nilais.index');
    }

    public function show(Nilai $nilai)
    {
        abort_if(Gate::denies('nilai_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nilais.show', compact('nilai'));
    }

    public function destroy(Nilai $nilai)
    {
        abort_if(Gate::denies('nilai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nilai->delete();

        return back();
    }

    public function massDestroy(MassDestroyNilaiRequest $request)
    {
        $nilais = Nilai::find(request('ids'));

        foreach ($nilais as $nilai) {
            $nilai->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
