<?php

namespace App\Http\Requests;

use App\Models\Penduduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePendudukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penduduk_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'nik' => [
                'string',
                'max:18',
                'required',
            ],
            'jenis_kelamin' => [
                'required',
            ],
            'tanggal_lahir' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'alamat' => [
                'required',
            ],
            'provinsi_id' => [
                'required',
                'integer',
            ],
            'kabupaten_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
