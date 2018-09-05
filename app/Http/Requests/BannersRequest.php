<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'required|mimes:jpg,png,jpeg',
            'head'  => 'required|string|max:200',
            'body'  => 'required|string|max:200',
        ];
    }
}
