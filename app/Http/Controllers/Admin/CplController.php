<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCplRequest;
use App\Http\Requests\StoreCplRequest;
use App\Http\Requests\UpdateCplRequest;
use App\Models\Cpl;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CplController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cpl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cpls = Cpl::all();

        return view('admin.cpls.index', compact('cpls'));
    }

    public function create()
    {
        abort_if(Gate::denies('cpl_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cpls.create');
    }

    public function store(StoreCplRequest $request)
    {
        $cpl = Cpl::create($request->all());

        return redirect()->route('admin.cpls.index');
    }

    public function edit(Cpl $cpl)
    {
        abort_if(Gate::denies('cpl_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cpls.edit', compact('cpl'));
    }

    public function update(UpdateCplRequest $request, Cpl $cpl)
    {
        $cpl->update($request->all());

        return redirect()->route('admin.cpls.index');
    }

    public function show(Cpl $cpl)
    {
        abort_if(Gate::denies('cpl_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cpls.show', compact('cpl'));
    }

    public function destroy(Cpl $cpl)
    {
        abort_if(Gate::denies('cpl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cpl->delete();

        return back();
    }

    public function massDestroy(MassDestroyCplRequest $request)
    {
        $cpls = Cpl::find(request('ids'));

        foreach ($cpls as $cpl) {
            $cpl->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}