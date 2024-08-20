<?php

namespace App\Http\Requests;

use App\Models\Nilai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNilaiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nilai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:nilais,id',
        ];
    }
}
