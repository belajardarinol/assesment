<?php

namespace App\Http\Requests;

use App\Models\MataKuliah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMataKuliahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mata_kuliah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mata_kuliahs,id',
        ];
    }
}