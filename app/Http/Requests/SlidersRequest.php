<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'     => 'required|mimes:jpg,png,jpeg',
            'title'     => 'required|string|max:200',
            'subtitle'  => 'required|string|max:200',
        ];
    }
}
