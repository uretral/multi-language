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
        config(['admin.auth.excepts' => ['auth/login','locale']]);

        $languages = MultiLanguage::config('languages');
        $cookie_name = MultiLanguage::config('cookie-name', 'locale');

        if (Cookie::has($cookie_name) && array_key_exists(Cookie::get($cookie_name), $languages)) {
            App::setLocale(Cookie::get($cookie_name));
        } else {
            $default = MultiLanguage::config('default');
            App::setLocale($default);
        }

        return $next($request);
    }
}
