<?php

namespace App\View\Components;

use App\Models\Language;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Menu extends Component
{
    public $languages;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->languages = Cache::rememberForever('active_languages', function () {
            return collect(Language::active()->get());
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu');
    }
}
