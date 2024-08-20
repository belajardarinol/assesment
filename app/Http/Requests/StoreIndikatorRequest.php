<?php

namespace App\Http\Requests;

use App\Models\Nilai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNilaiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nilai_create');
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
