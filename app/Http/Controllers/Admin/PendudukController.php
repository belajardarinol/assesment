<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPendudukRequest;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use App\Models\Kabupaten;
use App\Models\Penduduk;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PendudukController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('penduduk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penduduks = Penduduk::with(['provinsi', 'kabupaten'])->get();

        return view('admin.penduduks.index', compact('penduduks'));
    }

    public function create()
    {
        abort_if(Gate::denies('penduduk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsis = Provinsi::pluck('nama_provinsi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kabupatens = Kabupaten::pluck('nama_kabupaten', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.penduduks.create', compact('kabupatens', 'provinsis'));
    }

    public function store(StorePendudukRequest $request)
    {
        $penduduk = Penduduk::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $penduduk->id]);
        }

        return redirect()->route('admin.penduduks.index');
    }

    public function edit(Penduduk $penduduk)
    {
        abort_if(Gate::denies('penduduk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsis = Provinsi::pluck('nama_provinsi', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kabupatens = Kabupaten::pluck('nama_kabupaten', 'id')->prepend(trans('global.pleaseSelect'), '');

        $penduduk->load('provinsi', 'kabupaten');

        return view('admin.penduduks.edit', compact('kabupatens', 'penduduk', 'provinsis'));
    }

    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        $penduduk->update($request->all());

        return redirect()->route('admin.penduduks.index');
    }

    public function show(Penduduk $penduduk)
    {
        abort_if(Gate::denies('penduduk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penduduk->load('provinsi', 'kabupaten');

        return view('admin.penduduks.show', compact('penduduk'));
    }

    public function destroy(Penduduk $penduduk)
    {
        abort_if(Gate::denies('penduduk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penduduk->delete();

        return back();
    }

    public function massDestroy(MassDestroyPendudukRequest $request)
    {
        $penduduks = Penduduk::find(request('ids'));

        foreach ($penduduks as $penduduk) {
            $penduduk->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('penduduk_create') && Gate::denies('penduduk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Penduduk();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
