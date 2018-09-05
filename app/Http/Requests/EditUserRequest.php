<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstName' => 'required|string|min:3|max:20',
            'lastName'  => 'required|string|min:3|max:20',
            'username'  => 'required|string|min:8|max:20',
            'location'  => 'required|min:10|max:255',
            'jop'       => 'required|string|min:10|max:255',
            'mobile'    => 'required|string|max:11',
            'dob'       => 'required|date',
            'email'     => 'required|string|email|max:255',
            'image'     => 'mimes:jpg,png,jpeg',
        ];
    }
}
