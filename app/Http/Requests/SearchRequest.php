<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        return [
            'search' => 'string|max:444',
        ];
    }

    /**
     * Sanitize input before validation.
     */
    protected function prepareForValidation()
    {
        $this->sanitize();
    }

    /**
     * Sanitize input fields.
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['search'] = strip_tags($input['search']);
        $this->replace($input);
    }
}
