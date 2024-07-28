<?php

namespace App\Http\Requests;

use App\Models\Provinsi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProvinsiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('provinsi_edit');
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