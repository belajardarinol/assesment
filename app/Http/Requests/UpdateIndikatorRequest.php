<?php

namespace App\Http\Requests;

use App\Models\Nilai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNilaiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nilai_edit');
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
