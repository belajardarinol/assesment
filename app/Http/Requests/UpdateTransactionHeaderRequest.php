<?php

namespace App\Http\Requests;

use App\Models\TransactionHeader;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_header_edit');
    }

    public function rules()
    {
        return [
            'description' => [
                'string',
                'nullable',
            ],
            'code' => [
                'string',
                'nullable',
            ],
            'rate_euro' => [
                'numeric',
            ],
            'date_paid' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'transaction_details.*' => [
                'integer',
            ],
            'transaction_details' => [
                'array',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}