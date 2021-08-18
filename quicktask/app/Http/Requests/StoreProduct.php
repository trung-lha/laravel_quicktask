<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ProductRule;

class StoreProduct extends FormRequest
{
    public function rules()
    {
        $productRule = new ProductRule();
        return [
            'name' => 'required|max:30|string',
            'price' => 'required|min:1',
            'quantity' => 'required|digits_between:1,2',
            'type_id' => [$productRule],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('index.name_required'),
            'price.required' => __('index.price_require'),
            'quantity.digits_between' => __('index.quantity_limit'),
            'price.min' => __('index.price_limit'),
        ];
    }
}

