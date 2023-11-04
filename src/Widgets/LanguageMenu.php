<?php


namespace Uretral\MultiLanguage\Widgets;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Entities\Country;
use Uretral\MultiLanguage\MultiLanguage;

class LanguageMenu implements Renderable
{

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        $currentLocale = MultiLanguage::config('default_locale');
        $currentCountry = MultiLanguage::config('default_country');
        $currentModule = MultiLanguage::config('default_module');

        $cookieLocale = MultiLanguage::config('cookie-locale', 'locale');
        $cookieCountry = MultiLanguage::config('cookie-country', 'country');
        $cookieModule = MultiLanguage::config('cookie-module', 'module');

        if (Cookie::has($cookieLocale)) {
            $currentLocale = Cookie::get($cookieLocale);
        }

        if (Cookie::has($cookieCountry)) {
            $currentCountry = Cookie::get($cookieCountry);
        }

        if (Cookie::has($cookieModule)) {
            $currentModule = Cookie::get($cookieModule);
        }

        $languages = MultiLanguage::config("languages");
        $countries = MultiLanguage::config("countries");
        $modules = MultiLanguage::config("modules");

        return view("multi-language::language-menu", compact([
            'languages', 'currentLocale',
            'countries', 'currentCountry',
            'modules', 'currentModule',
        ]))->render();
    }
}
