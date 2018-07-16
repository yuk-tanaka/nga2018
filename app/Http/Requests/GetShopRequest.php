<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetShopRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'favorites' => ['nullable', 'array'],
            'favirites.*' => ['nullable', 'integer', Rule::exists('shops', 'id')],
            'cities' => ['nullable', 'array'],
            'cities.*' => ['nullable', 'integer', Rule::exists('cities', 'id')],
            'areas' => ['nullable', 'array'],
            'areas.*' => ['nullable', 'integer', Rule::exists('areas', 'id')],
        ];
    }
}
