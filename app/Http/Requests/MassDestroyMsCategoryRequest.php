<?php

namespace App\Http\Requests;

use App\Models\MsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ms_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ms_categories,id',
        ];
    }
}