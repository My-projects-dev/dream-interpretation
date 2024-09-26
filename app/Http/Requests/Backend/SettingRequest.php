<?php

namespace App\Http\Requests\Backend;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
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
                'value:' . $lang => ['nullable','string'],
            ];
        }

        $return[] = [
            'status' => 'required|in:"0", "1"',
            'key'=>'required|string|max:255|unique:settings,key',
            'static_value'=>'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',

        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PUT') {

            $id = $this->route('setting')['id'];

            $return[] = [
                'image' => 'filled',
                'status' => 'required|in:"0", "1"',
                'key' => ['required', 'string','max:255', Rule::unique('settings', 'key')->ignore($id)],
            ];
        }

        return Arr::collapse($return);
    }
}
