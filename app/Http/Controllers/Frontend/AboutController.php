<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index($language = 'en')
    {
        $about = About::active()->first();

        language_counter($language);

        return view('frontend.pages.about', compact('about'));
    }
}
