<?php

namespace App\Http\Requests;

use App\Models\MataKuliah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMataKuliahRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mata_kuliah_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'sks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jumlah_pertemuan' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
