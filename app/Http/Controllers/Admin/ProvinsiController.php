<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProvinsiRequest;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvinsiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provinsi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsis = Provinsi::all();

        return view('admin.provinsis.index', compact('provinsis'));
    }

    public function create()
    {
        abort_if(Gate::denies('provinsi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provinsis.create');
    }

    public function store(StoreProvinsiRequest $request)
    {
        $provinsi = Provinsi::create($request->all());

        return redirect()->route('admin.provinsis.index');
    }

    public function edit(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provinsis.edit', compact('provinsi'));
    }

    public function update(UpdateProvinsiRequest $request, Provinsi $provinsi)
    {
        $provinsi->update($request->all());

        return redirect()->route('admin.provinsis.index');
    }

    public function show(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provinsis.show', compact('provinsi'));
    }

    public function destroy(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsi->delete();

        return back();
    }

    public function massDestroy(MassDestroyProvinsiRequest $request)
    {
        $provinsis = Provinsi::find(request('ids'));

        foreach ($provinsis as $provinsi) {
            $provinsi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
