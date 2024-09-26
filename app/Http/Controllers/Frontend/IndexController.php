<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SearchRequest;
use App\Models\Dream;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index($language = 'en')
    {
        $dreams = Dream::query()->active()->latest()->paginate(1);

        language_counter($language);

        return view('frontend.index', compact('dreams'));
    }

    public function search(Request $request)
    {
        $name = $request->search;
        $tokens = explode(' ', $name);
        $columns = ['name', 'keywords', 'title', 'text'];

        $dreams = Dream::query()
            ->active()
            ->latest()
            ->whereHas('translations', function ($query) use ($columns, $tokens) {
                $query->where('locale', app()->getLocale())
                    ->where(function ($query) use ($tokens, $columns) {
                        foreach ($columns as $column) {
                            foreach ($tokens as $token) {
                                $query->orWhereRaw("SOUNDEX($column) = SOUNDEX(?)", [$token])
                                    ->orWhere($column, 'LIKE', '%' . $token . '%');
                            }
                        }
                    });
            })
            ->paginate(9);

        $dream_message = (count($dreams) > 0) ? '' : __('frontend.not_found');

        return view('frontend.index', compact('dreams', 'dream_message'));
    }
}
