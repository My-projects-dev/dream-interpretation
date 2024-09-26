<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => ['required','max:100'],
            'email' => ['required','email','max:255'],
            'subject' => ['required','string','max:500'],
            'message' => ['required','string'],
        ];
    }
}
