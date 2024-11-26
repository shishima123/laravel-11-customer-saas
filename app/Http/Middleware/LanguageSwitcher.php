<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Response for Api
        if ($request->wantsJson()) {
            $locale = $request->hasHeader('X-localization') ? $request->header('X-localization') : 'en';
            app()->setLocale($locale);

            return $next($request);
        }

        if ($request->get('locale') || Cookie::has('locale')) {
            $locale = $request->get('locale', Cookie::get('locale'));
            if (! in_array($locale, ['en', 'ja'])) {
                $locale = config('app.locale');
            }
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
