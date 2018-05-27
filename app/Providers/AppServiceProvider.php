<?php

namespace LaNeta\Providers;

use Illuminate\Support\ServiceProvider;
use LaNeta\User;
use LaNeta\Models\Notification;
use LaNeta\Mail\ConfirmationRegister;
use LaNeta\Mail\UserMailChanged;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Mail;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function($user){
                retry(5, function() use ($user) {
                    Mail::to($user)->send( new ConfirmationRegister($user));
                }, 100);                
        });

        User::updated(function($user){
            if ($user->isDirty('email')) {
                retry(5, function() use ($user) {
                    Mail::to($user)->send( new UserMailChanged($user));
                }, 100);
            }
        });

     
        

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
