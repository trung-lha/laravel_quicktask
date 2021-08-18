<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreType extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('index.name_required'),
        ];
    }
}
