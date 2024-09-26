<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class DreamRequest extends FormRequest
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

        foreach ($langs as $lang){
            $return[] = [
                'name:' . $lang => ['required', 'max:255'],
                'slug:' . $lang => ['max:255', Rule::unique('dream_translations','slug')->ignore($this->slug)],
                'title:' . $lang => ['required', 'max:255'],
                'description:' . $lang => ['required', 'max:255'],
                'keywords:' . $lang => ['required', 'max:555'],
                'text:' . $lang => ['string'],
            ];

            // For Update
            if ($this->filled('_method') && $this->get('_method') == 'PUT') {

                $return[] = [
                    'slug:' . $lang => ['required','max:255'],
                ];
            }
        }

        $return[] = [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'status' => 'required|in:"0", "1"',
//            'category_id' => 'required|integer|min:1|exists:App\Models\DreamCategory,id',
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {
            $return[] = [
                'image' => 'filled',
            ];
        }

        return Arr::collapse($return);
    }
}
