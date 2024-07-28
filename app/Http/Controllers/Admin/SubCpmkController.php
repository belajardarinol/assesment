<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubCpmkRequest;
use App\Http\Requests\StoreSubCpmkRequest;
use App\Http\Requests\UpdateSubCpmkRequest;
use App\Models\SubCpmk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCpmkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_cpmk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCpmks = SubCpmk::all();

        return view('admin.subCpmks.index', compact('subCpmks'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_cpmk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subCpmks.create');
    }

    public function store(StoreSubCpmkRequest $request)
    {
        $subCpmk = SubCpmk::create($request->all());

        return redirect()->route('admin.sub-cpmks.index');
    }

    public function edit(SubCpmk $subCpmk)
    {
        abort_if(Gate::denies('sub_cpmk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subCpmks.edit', compact('subCpmk'));
    }

    public function update(UpdateSubCpmkRequest $request, SubCpmk $subCpmk)
    {
        $subCpmk->update($request->all());

        return redirect()->route('admin.sub-cpmks.index');
    }

    public function show(SubCpmk $subCpmk)
    {
        abort_if(Gate::denies('sub_cpmk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCpmk->load('subCpmkCpmks');

        return view('admin.subCpmks.show', compact('subCpmk'));
    }

    public function destroy(SubCpmk $subCpmk)
    {
        abort_if(Gate::denies('sub_cpmk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCpmk->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCpmkRequest $request)
    {
        $subCpmks = SubCpmk::find(request('ids'));

        foreach ($subCpmks as $subCpmk) {
            $subCpmk->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}