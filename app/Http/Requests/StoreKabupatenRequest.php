<?php

namespace App\Http\Requests;

use App\Models\Kabupaten;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKabupatenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kabupaten_create');
    }

    public function rules()
    {
        return [
            'provinsi_id' => [
                'required',
                'integer',
            ],
            'nama_kabupaten' => [
                'string',
                'required',
            ],
        ];
    }
}
