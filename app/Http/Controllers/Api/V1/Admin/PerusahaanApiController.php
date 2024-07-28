<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerusahaanRequest;
use App\Http\Requests\UpdatePerusahaanRequest;
use App\Http\Resources\Admin\PerusahaanResource;
use App\Models\Perusahaan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerusahaanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perusahaan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerusahaanResource(Perusahaan::with(['user'])->get());
    }

    public function store(StorePerusahaanRequest $request)
    {
        // var_dump($request->all());die;
        $perusahaan = Perusahaan::create($request->all());

        return (new PerusahaanResource($perusahaan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Perusahaan $perusahaan)
    {
        abort_if(Gate::denies('perusahaan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerusahaanResource($perusahaan->load(['user']));
    }

    public function update(UpdatePerusahaanRequest $request, Perusahaan $perusahaan)
    {
        $perusahaan->update($request->all());

        return (new PerusahaanResource($perusahaan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Perusahaan $perusahaan)
    {
        abort_if(Gate::denies('perusahaan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}