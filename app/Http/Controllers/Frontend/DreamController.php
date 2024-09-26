<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Dream;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class DreamController
{
    public function show($language='en', $slug)
    {
        $dreams = Cache::rememberForever('dreams', function () {
            return Dream::query()->active()->latest()->get();
        });

        $dream = $dreams->firstWhere('slug', $slug);


        if ($dream == null) {
            return redirect()->route('home');
        }

        $dreams = $dreams->where('id', '!=', $dream->id);

        $sessionId = Session::getId();
        $key = 'dream_views_' . $dream->id . '_' . $sessionId;

        if (!Cache::has($key)) {
            $dream->increment('views');
            Cache::forever($key, true);
        }

        language_counter($language);

        return view('frontend.pages.dream_show', compact('dream', 'dreams',));
    }
}
