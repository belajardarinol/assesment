<?php

namespace App\Http\Requests;

use App\Models\Cpmk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCpmkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cpmk_edit');
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
            'sub_cpmks.*' => [
                'integer',
            ],
            'sub_cpmks' => [
                'array',
            ],
        ];
    }
}