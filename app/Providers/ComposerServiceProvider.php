<?php

namespace LaNeta\Providers;

use Illuminate\Support\ServiceProvider;
use LaNeta\User;
use LaNeta\Models\Notification;
use Illuminate\Support\Facades\View;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
      View::composer('layouts.partials.navegator', 'LaNeta\Http\ViewComposers\ProfileComposer');
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
