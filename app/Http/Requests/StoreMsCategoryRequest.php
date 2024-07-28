<?php

namespace App\Http\Requests;

use App\Models\MsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ms_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}