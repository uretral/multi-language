<?php

namespace Uretral\MultiLanguage\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Modules\Admin\Entities\Country;
use Uretral\MultiLanguage\MultiLanguage;

class MultiLanguageController extends Controller
{

    public function locale() {
        $locale = Request::input('locale');
        $languages = MultiLanguage::config('languages');
        $cookie_locale = MultiLanguage::config('cookie-locale', 'locale');
        if(array_key_exists($locale, $languages)) {

            return response('ok')->cookie($cookie_locale, $locale);
        }
    }

    public function country() {
        $country = Request::input('country');
        $countries = MultiLanguage::config('countries');
        $defaultCountry =  MultiLanguage::config('default_country', 'ru');
        $cookie_country = MultiLanguage::config('cookie-country', $defaultCountry);
        if(array_key_exists($country, $countries)) {

            return response('ok')->cookie($cookie_country, $country);
        }
    }

    public function module() {
        $module = Request::input('module');
        $modules = MultiLanguage::config('modules');
        $defaultModule =  MultiLanguage::config('default_module', 'tenant');
        $cookie_module = MultiLanguage::config('cookie-module', $defaultModule);
        if(array_key_exists($module, $modules)) {

            return response('ok')->cookie($cookie_module, $module);
        }
    }

    public function getLogin() {
        $languages = MultiLanguage::config("languages");
        $cookie_name = MultiLanguage::config('cookie-locale', 'locale');

        $current = MultiLanguage::config('default');
        if(Cookie::has($cookie_name)) {
            $current = Cookie::get($cookie_name);
        }
        return view("multi-language::login", compact('languages', 'current'));
    }
}
