<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIndikatorRequest;
use App\Http\Requests\StoreIndikatorRequest;
use App\Http\Requests\UpdateIndikatorRequest;
use App\Models\Indikator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndikatorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('indikator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikators = Indikator::all();

        return view('admin.indikators.index', compact('indikators'));
    }

    public function create()
    {
        abort_if(Gate::denies('indikator_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikators.create');
    }

    public function store(StoreIndikatorRequest $request)
    {
        $indikator = Indikator::create($request->all());

        return redirect()->route('admin.indikators.index');
    }

    public function edit(Indikator $indikator)
    {
        abort_if(Gate::denies('indikator_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikators.edit', compact('indikator'));
    }

    public function update(UpdateIndikatorRequest $request, Indikator $indikator)
    {
        $indikator->update($request->all());

        return redirect()->route('admin.indikators.index');
    }

    public function show(Indikator $indikator)
    {
        abort_if(Gate::denies('indikator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikators.show', compact('indikator'));
    }

    public function destroy(Indikator $indikator)
    {
        abort_if(Gate::denies('indikator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indikator->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndikatorRequest $request)
    {
        $indikators = Indikator::find(request('ids'));

        foreach ($indikators as $indikator) {
            $indikator->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}