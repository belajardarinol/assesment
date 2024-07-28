<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Http\Resources\Admin\ProdukResource;
use App\Models\Produk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProdukResource(Produk::with(['user'])->get());
    }

    public function store(StoreProdukRequest $request)
    {
        // var_dump($request->all());die;
        $produk = Produk::create($request->all());

        foreach ($request->input('gambar', []) as $file) {
            $produk->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar');
        }

        if ($request->input('bump_image', false)) {
            $produk->addMedia(storage_path('tmp/uploads/' . basename($request->input('bump_image'))))->toMediaCollection('bump_image');
        }

        return (new ProdukResource($produk))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Produk $produk)
    {
        abort_if(Gate::denies('produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProdukResource($produk->load(['user']));
    }

    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());

        if (count($produk->gambar) > 0) {
            foreach ($produk->gambar as $media) {
                if (! in_array($media->file_name, $request->input('gambar', []))) {
                    $media->delete();
                }
            }
        }
        $media = $produk->gambar->pluck('file_name')->toArray();
        foreach ($request->input('gambar', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $produk->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar');
            }
        }

        if ($request->input('bump_image', false)) {
            if (! $produk->bump_image || $request->input('bump_image') !== $produk->bump_image->file_name) {
                if ($produk->bump_image) {
                    $produk->bump_image->delete();
                }
                $produk->addMedia(storage_path('tmp/uploads/' . basename($request->input('bump_image'))))->toMediaCollection('bump_image');
            }
        } elseif ($produk->bump_image) {
            $produk->bump_image->delete();
        }

        return (new ProdukResource($produk))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Produk $produk)
    {
        abort_if(Gate::denies('produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}