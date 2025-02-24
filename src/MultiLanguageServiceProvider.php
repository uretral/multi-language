<?php

namespace Uretral\MultiLanguage;

use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Uretral\MultiLanguage\Widgets\LanguageMenu;

class MultiLanguageServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(MultiLanguage $extension)
    {
        if (! MultiLanguage::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'multi-language');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/uretral/multi-language')],
                'multi-language'
            );
        }

        $this->app->booted(function () {
            MultiLanguage::routes(__DIR__.'/../routes/web.php');
        });

        # $this->app->make('Illuminate\Contracts\Http\Kernel')->prependMiddleware(Middlewares\MultiLanguageMiddleware::class);
        $this->app['router']->pushMiddlewareToGroup('web', Middlewares\MultiLanguageMiddleware::class);
        if(MultiLanguage::config("show-navbar", true)) {
            Admin::navbar()->add(new LanguageMenu());
        }
    }
}
