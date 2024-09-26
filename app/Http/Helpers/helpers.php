<?php

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;


if (!function_exists('locale')) {
    function locale()
    {
        return Session::get('language') ?? 'en';
    }
}

if (!function_exists('settings')) {
    function settings($type = null)
    {
        $return = '';

        $settings = Cache::rememberForever('settings', function () {
            return collect(Setting::active()->get());
        });

        foreach ($settings as $setting) {
            if ($setting->key == $type) {
                return $setting->translations->where('locale', locale())->first()->value ?? '';
            }
        }

        return $return;
    }
}

if (!function_exists('static_setting')) {
    function static_setting($type = null)
    {
        $return = '';

        $settings = Cache::rememberForever('settings', function () {
            return collect(Setting::active()->get());
        });

        foreach ($settings as $setting) {
            if ($setting->key == $type) {
                return $setting->static_value ?? '';
            }
        }

        return $return;
    }
}


if (!function_exists('admin')) {
    function admin()
    {
        return auth('admin')->user();
    }
}

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}


if (!function_exists('image_url')) {
    function image_url($file, $name)
    {
        return asset("uploads/$file/$name");
    }
}

if (!function_exists('language_counter')) {
    function language_counter($language = 'en')
    {
        $languages = Cache::rememberForever('languages', function () {
            return collect(Language::get());
        });

        $lang =  $languages->where('lang_code', $language)->first();
        $sessionId = Session::getId();
        $key = 'language' . $lang->id . '_' . $sessionId;

        if (!Cache::has($key)) {
            $lang->increment('view');
            Cache::forever($key, true);
        }
    }
}
