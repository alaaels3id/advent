<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'co_name'    => 'required|string|max:255', 
            'co_email'   => 'required|string|email|max:255',
            'co_subject' => 'required|string|max:255', 
            'co_message' => 'required|string|max:255',
            'co_type'    => 'required'
        ];
    }
}
