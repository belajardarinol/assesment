<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKlasifikasiRequest;
use App\Http\Requests\StoreKlasifikasiRequest;
use App\Http\Requests\UpdateKlasifikasiRequest;
use App\Models\Klasifikasi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KlasifikasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('klasifikasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klasifikasis = Klasifikasi::all();

        return view('admin.klasifikasis.index', compact('klasifikasis'));
    }

    public function create()
    {
        abort_if(Gate::denies('klasifikasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.klasifikasis.create');
    }

    public function store(Request $request)
    {
        $klasifikasi = Klasifikasi::create($request->all());

        return redirect()->route('admin.klasifikasis.index');
    }

    public function edit(Klasifikasi $klasifikasi)
    {
        abort_if(Gate::denies('klasifikasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.klasifikasis.edit', compact('klasifikasi'));
    }

    public function update(Request $request, Klasifikasi $klasifikasi)
    {
        $klasifikasi->update($request->all());

        return redirect()->route('admin.klasifikasis.index');
    }

    public function show(Klasifikasi $klasifikasi)
    {
        abort_if(Gate::denies('klasifikasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klasifikasi->load('klasifikasiMateris');

        return view('admin.klasifikasis.show', compact('klasifikasi'));
    }

    public function destroy(Klasifikasi $klasifikasi)
    {
        abort_if(Gate::denies('klasifikasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klasifikasi->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $klasifikasis = Klasifikasi::find(request('ids'));

        foreach ($klasifikasis as $klasifikasi) {
            $klasifikasi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
