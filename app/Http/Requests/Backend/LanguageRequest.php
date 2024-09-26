<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $return = [];

        $return[] = [
            'language' => 'required|max:30|unique:languages,language',
            'lang_code' => 'required|max:3|unique:languages,lang_code',
            'status' => 'required|in:"0", "1"',
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $id = $this->route('language')['id'];

            $return[] = [
                'language' => ['required', 'string','max:30', Rule::unique('languages', 'language')->ignore($id)],
                'lang_code' => ['required', 'string','max:3', Rule::unique('languages', 'lang_code')->ignore($id)],
                'view' => 'filled',
            ];
        }

        return Arr::collapse($return);
    }
}
