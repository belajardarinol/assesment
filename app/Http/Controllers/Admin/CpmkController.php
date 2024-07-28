<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCpmkRequest;
use App\Http\Requests\StoreCpmkRequest;
use App\Http\Requests\UpdateCpmkRequest;
use App\Models\Cpmk;
use App\Models\SubCpmk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CpmkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cpmk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cpmks = Cpmk::with(['sub_cpmks'])->get();

        return view('admin.cpmks.index', compact('cpmks'));
    }

    public function create()
    {
        abort_if(Gate::denies('cpmk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_cpmks = SubCpmk::pluck('name', 'id');

        return view('admin.cpmks.create', compact('sub_cpmks'));
    }

    public function store(StoreCpmkRequest $request)
    {
        $cpmk = Cpmk::create($request->all());
        $cpmk->sub_cpmks()->sync($request->input('sub_cpmks', []));

        return redirect()->route('admin.cpmks.index');
    }

    public function edit(Cpmk $cpmk)
    {
        abort_if(Gate::denies('cpmk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_cpmks = SubCpmk::pluck('name', 'id');

        $cpmk->load('sub_cpmks');

        return view('admin.cpmks.edit', compact('cpmk', 'sub_cpmks'));
    }

    public function update(UpdateCpmkRequest $request, Cpmk $cpmk)
    {
        $cpmk->update($request->all());
        $cpmk->sub_cpmks()->sync($request->input('sub_cpmks', []));

        return redirect()->route('admin.cpmks.index');
    }

    public function show(Cpmk $cpmk)
    {
        abort_if(Gate::denies('cpmk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cpmk->load('sub_cpmks');

        return view('admin.cpmks.show', compact('cpmk'));
    }

    public function destroy(Cpmk $cpmk)
    {
        abort_if(Gate::denies('cpmk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cpmk->delete();

        return back();
    }

    public function massDestroy(MassDestroyCpmkRequest $request)
    {
        $cpmks = Cpmk::find(request('ids'));

        foreach ($cpmks as $cpmk) {
            $cpmk->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}