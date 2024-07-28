<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionHeaderRequest;
use App\Http\Requests\StoreTransactionHeaderRequest;
use App\Http\Requests\UpdateTransactionHeaderRequest;
use App\Models\MsCategory;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionHeaderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactionHeaders = TransactionHeader::with(['transaction_details', 'category'])->get();

        return view('admin.transactionHeaders.index', compact('transactionHeaders'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_header_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction_details = TransactionDetail::pluck('name', 'id');

        $categories = MsCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transactionHeaders.create', compact('categories', 'transaction_details'));
    }

    // public function store(StoreTransactionHeaderRequest $request)
    // {
    //     $transactionHeader = TransactionHeader::create($request->all());
    //     $transactionHeader->transaction_details()->sync($request->input('transaction_details', []));

    //     return redirect()->route('admin.transaction-headers.index');
    // }

    public function edit(TransactionHeader $transactionHeader)
    {
        abort_if(Gate::denies('transaction_header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction_details = TransactionDetail::pluck('name', 'id');

        $categories = MsCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactionHeader->load('transaction_details', 'category');

        return view('admin.transactionHeaders.edit', compact('categories', 'transactionHeader', 'transaction_details'));
    }

    public function store(StoreTransactionHeaderRequest $request)
    {
        var_dump($request->all());
        die;
        $transactionHeader = TransactionHeader::create($request->all());

        foreach ($request->input('details', []) as $detail) {
            $transactionHeader->transaction_details()->create($detail);
        }

        return redirect()->route('admin.transaction-headers.index');
    }

    public function update(UpdateTransactionHeaderRequest $request, TransactionHeader $transactionHeader)
    {
        $transactionHeader->update($request->all());

        $transactionHeader->transaction_details()->delete();

        foreach ($request->input('details', []) as $detail) {
            $transactionHeader->transaction_details()->create($detail);
        }

        return redirect()->route('admin.transaction-headers.index');
    }


    // public function update(UpdateTransactionHeaderRequest $request, TransactionHeader $transactionHeader)
    // {
    //     $transactionHeader->update($request->all());
    //     $transactionHeader->transaction_details()->sync($request->input('transaction_details', []));

    //     return redirect()->route('admin.transaction-headers.index');
    // }

    public function show(TransactionHeader $transactionHeader)
    {
        abort_if(Gate::denies('transaction_header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactionHeader->load('transaction_details', 'category', 'transactionTransactionDetails');

        return view('admin.transactionHeaders.show', compact('transactionHeader'));
    }

    public function destroy(TransactionHeader $transactionHeader)
    {
        abort_if(Gate::denies('transaction_header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactionHeader->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionHeaderRequest $request)
    {
        $transactionHeaders = TransactionHeader::find(request('ids'));

        foreach ($transactionHeaders as $transactionHeader) {
            $transactionHeader->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}