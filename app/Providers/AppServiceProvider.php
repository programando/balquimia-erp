<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use DB;
use Cache;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      $Menu = Cache::tags('MenuOpciones')->rememberForever('Menu', function(){
            return DB::select(' call menus_listado() ');
      });
        view::share('Menu', $Menu);
        view::share('Browser_Title',    config('_app.APP_NAME'));
        view::share('Page_Description', config('_app.APP_DESCRIPTION'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
