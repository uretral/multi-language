<?php

namespace Uretral\MultiLanguage\Middlewares;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Uretral\MultiLanguage\MultiLanguage;

class MultiLanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        config(['admin.auth.excepts' => ['auth/login', 'locale']]);

        $languages = MultiLanguage::config('languages');

        $cookieLocale = MultiLanguage::config('cookie-locale', 'locale');

        if (Cookie::has($cookieLocale) && array_key_exists(Cookie::get($cookieLocale), $languages)) {
            App::setLocale(Cookie::get($cookieLocale));
        } else {
            $default = MultiLanguage::config('default_locale');
            App::setLocale($default);
        }

        return $next($request);
    }
}
