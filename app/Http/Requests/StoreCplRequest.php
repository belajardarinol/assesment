<?php

namespace App\Http\Requests;

use App\Models\Cpl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCplRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cpl_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'value' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}