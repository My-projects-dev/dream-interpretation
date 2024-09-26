<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function __invoke($language = 'en', $lang, Request $request)
    {
//        dd(url());
        if (array_key_exists($lang, $config = Config::get('translatable.supportedLocales'))) {
            Session::put('language', $lang);
            Session::put('locale_name', $config[$lang]['native']);
            Session::put('locale_flag', $config[$lang]['flag']);
        }

        if (!is_null($request->url) && str_starts_with($request->url ?: '',env('APP_URL'))) {
            return redirect()->to($request->url);
        }
        return back();
    }
}
