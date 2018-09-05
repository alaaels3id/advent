<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'Required|string|min:4',
            'price'       => 'Required|numeric|min:2',
            'image'       => 'mimes:png,jpg,jpeg',
            'model'       => 'Required|integer|min:4',
            'discription' => 'Required|string|min:10|max:500'
        ];
    }
}
