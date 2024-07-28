<?php

namespace App\Http\Requests;

use App\Models\Perusahaan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePerusahaanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perusahaan_create');
    }

    public function rules()
    {
        return [
            'nama_perusahaan' => [
                'string',
                'required',
            ],
            'alamat_perusahaan' => [
                'string',
                'nullable',
            ],
            'website_perusahaan' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'tiktok' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
        ];
    }
}