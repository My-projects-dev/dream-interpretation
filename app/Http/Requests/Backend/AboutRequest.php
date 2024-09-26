<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class AboutRequest extends FormRequest
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

        $langs = Cache::rememberForever('lang_code', function () {
            return Language::active()->pluck('lang_code');
        });

        foreach ($langs as $lang) {
            $return[] = [
                'title:' . $lang => ['required', 'max:255'],
                'content:' . $lang => ['string'],
            ];
        }

        $return[] = [
            'status' => 'required|in:"0", "1"',
        ];

        return Arr::collapse($return);
    }
}
