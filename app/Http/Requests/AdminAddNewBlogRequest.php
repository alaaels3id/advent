<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAddNewBlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:50',
            'body'  => 'required|string|min:3|max:255',
            'image' => 'mimes:png,jpg,jpeg',
        ];
    }
}
