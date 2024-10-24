<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyKelaRequest;
use App\Http\Requests\StoreKelaRequest;
use App\Http\Requests\UpdateKelaRequest;
use App\Models\Kela;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class KelasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('kela_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelas = Kela::with(['siswa', 'media'])->get();

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        abort_if(Gate::denies('kela_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siswas = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.kelas.create', compact('siswas'));
    }

    public function store(StoreKelaRequest $request)
    {
        $kela = Kela::create($request->all());

        if ($request->input('file_result', false)) {
            $kela->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_result'))))->toMediaCollection('file_result');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $kela->id]);
        }

        return redirect()->route('admin.kelas.index');
    }

    public function edit(Kela $kela)
    {
        abort_if(Gate::denies('kela_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siswas = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kela->load('siswa');

        return view('admin.kelas.edit', compact('siswas', 'kela'));
    }

    public function update(UpdateKelaRequest $request, Kela $kela)
    {
        $kela->update($request->all());

        if ($request->input('file_result', false)) {
            if (! $kela->file_result || $request->input('file_result') !== $kela->file_result->file_name) {
                if ($kela->file_result) {
                    $kela->file_result->delete();
                }
                $kela->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_result'))))->toMediaCollection('file_result');
            }
        } elseif ($kela->file_result) {
            $kela->file_result->delete();
        }

        return redirect()->route('admin.kelas.index');
    }

    public function show(Kela $kela)
    {
        abort_if(Gate::denies('kela_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kela->load('siswa');

        return view('admin.kelas.show', compact('kela'));
    }

    public function destroy(Kela $kela)
    {
        abort_if(Gate::denies('kela_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kela->delete();

        return back();
    }

    public function massDestroy(MassDestroyKelaRequest $request)
    {
        $kelas = Kela::find(request('ids'));

        foreach ($kelas as $kela) {
            $kela->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('kela_create') && Gate::denies('kela_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Kela();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
