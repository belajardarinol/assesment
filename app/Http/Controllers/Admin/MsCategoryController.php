<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMsCategoryRequest;
use App\Http\Requests\StoreMsCategoryRequest;
use App\Http\Requests\UpdateMsCategoryRequest;
use App\Models\MsCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MsCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ms_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $msCategories = MsCategory::all();

        return view('admin.msCategories.index', compact('msCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('ms_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.msCategories.create');
    }

    public function store(StoreMsCategoryRequest $request)
    {
        $msCategory = MsCategory::create($request->all());

        return redirect()->route('admin.ms-categories.index');
    }

    public function edit(MsCategory $msCategory)
    {
        abort_if(Gate::denies('ms_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.msCategories.edit', compact('msCategory'));
    }

    public function update(UpdateMsCategoryRequest $request, MsCategory $msCategory)
    {
        $msCategory->update($request->all());

        return redirect()->route('admin.ms-categories.index');
    }

    public function show(MsCategory $msCategory)
    {
        abort_if(Gate::denies('ms_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $msCategory->load('categoryTransactionHeaders');

        return view('admin.msCategories.show', compact('msCategory'));
    }

    public function destroy(MsCategory $msCategory)
    {
        abort_if(Gate::denies('ms_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $msCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMsCategoryRequest $request)
    {
        $msCategories = MsCategory::find(request('ids'));

        foreach ($msCategories as $msCategory) {
            $msCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}