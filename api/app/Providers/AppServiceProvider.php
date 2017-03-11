<?php

namespace HttpClient\Providers;

use Illuminate\Support\ServiceProvider;
use HttpClient\Home;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      //  $view->with('rootcat', $this->obtainRootCategories());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->navbar();
    }

    public function navbar()
    {
      //  view()->composer('partials.navigation_configurator', 'HttpClient\Http\Controllers\HomeController@compose');
          view()->composer('partials.navigation_3', 'HttpClient\Http\Controllers\HomeController@compose');
    }
}
