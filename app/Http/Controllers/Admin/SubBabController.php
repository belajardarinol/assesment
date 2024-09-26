<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubBabRequest;
use App\Http\Requests\StoreSubBabRequest;
use App\Http\Requests\UpdateSubBabRequest;
use App\Models\Bab;
use App\Models\SubBab;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubBabController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_bab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subBabs = SubBab::with(['bab'])->get();

        return view('admin.subBabs.index', compact('subBabs'));
    }

    public function getSubBab(Request $request)
    {
        // Validasi request untuk memastikan id bab ada
        $request->validate([
            'bab_id' => 'required|exists:babs,id',
        ]);

        // Ambil sub-babs berdasarkan bab_id yang dikirim dari frontend
        $subBabs = SubBab::where('bab_id', $request->bab_id)
            ->select('id', 'judul_sub_bab')
            ->get();

        // Kembalikan data dalam format JSON
        return response()->json($subBabs);
    }

    public function create()
    {
        abort_if(Gate::denies('sub_bab_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $babs = Bab::pluck('judul_bab', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subBabs.create', compact('babs'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->bab_id == null) {
            return redirect()->back()->with('error', 'Pilih Bab terlebih dahulu');
        }
        if ($request->sub_bab != null) {
            // echo 111;
            $sub = SubBab::where('bab_id', $request->bab_id)->first();
            // var_dump($sub->judul_sub_bab);
            $subBab = $sub->judul_sub_bab;
            $data['judul_sub_bab'] = $subBab;
            // var_dump($request->judul_sub_bab);
            // die;
        }
        // var_dump($data);
        // die;
        $subBab = SubBab::create($data);

        return redirect()->route('admin.sub-babs.index');
    }

    public function edit(SubBab $subBab)
    {
        abort_if(Gate::denies('sub_bab_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $babs = Bab::pluck('judul_bab', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subBab->load('bab');

        return view('admin.subBabs.edit', compact('babs', 'subBab'));
    }

    public function update(Request $request, SubBab $subBab)
    {
        $subBab->update($request->all());

        return redirect()->route('admin.sub-babs.index');
    }

    public function show(SubBab $subBab)
    {
        abort_if(Gate::denies('sub_bab_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subBab->load('bab');

        return view('admin.subBabs.show', compact('subBab'));
    }

    public function destroy(SubBab $subBab)
    {
        abort_if(Gate::denies('sub_bab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subBab->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $subBabs = SubBab::find(request('ids'));

        foreach ($subBabs as $subBab) {
            $subBab->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
