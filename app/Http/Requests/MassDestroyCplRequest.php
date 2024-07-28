<?php

namespace App\Http\Requests;

use App\Models\Cpl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCplRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cpl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cpls,id',
        ];
    }
}