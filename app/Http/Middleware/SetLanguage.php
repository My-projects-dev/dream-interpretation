<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!in_array($request->language, config('translatable.locales'))) {

            $segments = array_slice($request->segments(), 1);
            $locale = Session::get('language', config('app.locale'));

            return redirect()->to(url($locale . '/' . implode('/', $segments)));
        }

        Session::put('language', $request->language);
        App::setLocale($request->language);

        return $next($request);
    }
}
