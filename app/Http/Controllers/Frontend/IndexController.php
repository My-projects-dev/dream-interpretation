<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Dream;

class IndexController extends Controller
{
    public function index($language = 'en')
    {
        $dreams = Dream::query()->active()->latest()->paginate(9);

        language_counter($language);

        return view('frontend.index', compact('dreams'));
    }

    public function search(Request $request)
    {
        $name = strip_tags($request->search);

        if (empty(trim($name))) {
            return redirect()->route('home');
        }

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
