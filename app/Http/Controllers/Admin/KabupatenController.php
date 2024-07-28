<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class KabupatenController extends Controller
// {
//     //
// }

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKabupatenRequest;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KabupatenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kabupaten_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupatens = Kabupaten::with(['provinsi'])->get();

        return view('admin.kabupatens.index', compact('kabupatens'));
    }

    public function create()
    {
        abort_if(Gate::denies('kabupaten_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsis = Provinsi::pluck('nama_provinsi', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.kabupatens.create', compact('provinsis'));
    }

    public function store(StoreKabupatenRequest $request)
    {
        $kabupaten = Kabupaten::create($request->all());

        return redirect()->route('admin.kabupatens.index');
    }

    public function edit(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsis = Provinsi::pluck('nama_provinsi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kabupaten->load('provinsi');

        return view('admin.kabupatens.edit', compact('kabupaten', 'provinsis'));
    }

    public function update(UpdateKabupatenRequest $request, Kabupaten $kabupaten)
    {
        $kabupaten->update($request->all());

        return redirect()->route('admin.kabupatens.index');
    }

    public function show(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->load('provinsi');

        return view('admin.kabupatens.show', compact('kabupaten'));
    }

    public function destroy(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->delete();

        return back();
    }

    public function massDestroy(MassDestroyKabupatenRequest $request)
    {
        $kabupatens = Kabupaten::find(request('ids'));

        foreach ($kabupatens as $kabupaten) {
            $kabupaten->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}