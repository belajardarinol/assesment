<?php

namespace App\Http\Requests;

use App\Models\TransactionHeader;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransactionHeaderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaction_header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:transaction_headers,id',
        ];
    }
}