<?php

namespace App\Http\Requests;

use App\Models\Provinsi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProvinsiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provinsi_create');
    }

    public function rules()
    {
        return [
            'nama_provinsi' => [
                'string',
                'required',
            ],
        ];
    }
}