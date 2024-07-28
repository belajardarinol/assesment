<?php

namespace App\Http\Requests;

use App\Models\SubCpmk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubCpmkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_cpmk_edit');
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