<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMateriRequest;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;
use App\Models\Klasifikasi;
use App\Models\Materi;
use App\Models\SubBab;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MateriController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('materi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materis = Materi::with(['sub_bab', 'klasifikasis'])->get();

        return view('admin.materis.index', compact('materis'));
    }

    public function create()
    {
        abort_if(Gate::denies('materi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_babs = SubBab::pluck('judul_sub_bab', 'id')->prepend(trans('global.pleaseSelect'), '');

        $klasifikasis = Klasifikasi::pluck('klasifikasi', 'id');

        return view('admin.materis.create', compact('klasifikasis', 'sub_babs'));
    }

    public function store(Request $request)
    {
        $materi = Materi::create($request->all());
        $materi->klasifikasis()->sync($request->input('klasifikasis', []));

        return redirect()->route('admin.materis.index');
    }

    public function edit(Materi $materi)
    {
        abort_if(Gate::denies('materi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_babs = SubBab::pluck('judul_sub_bab', 'id')->prepend(trans('global.pleaseSelect'), '');

        $klasifikasis = Klasifikasi::pluck('klasifikasi', 'id');

        $materi->load('sub_bab', 'klasifikasis');

        return view('admin.materis.edit', compact('klasifikasis', 'materi', 'sub_babs'));
    }

    public function update(Request $request, Materi $materi)
    {
        $materi->update($request->all());
        $materi->klasifikasis()->sync($request->input('klasifikasis', []));

        return redirect()->route('admin.materis.index');
    }

    public function show(Materi $materi)
    {
        abort_if(Gate::denies('materi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materi->load('sub_bab', 'klasifikasis');

        return view('admin.materis.show', compact('materi'));
    }

    public function destroy(Materi $materi)
    {
        abort_if(Gate::denies('materi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materi->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $materis = Materi::find(request('ids'));

        foreach ($materis as $materi) {
            $materi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
