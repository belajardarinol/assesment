<?php

namespace App\Http\Requests;

use App\Models\TransactionDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_detail_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'value_idr' => [
                'numeric',
                'required',
            ],
            'transactions.*' => [
                'integer',
            ],
            'transactions' => [
                'array',
            ],
        ];
    }
}