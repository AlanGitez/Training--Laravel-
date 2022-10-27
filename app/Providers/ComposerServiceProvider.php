<?php

namespace App\Providers;
use Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        
        View::composer("commons.header", function($view){
            $user = Session::get("user") ?? null;
            return $view->with([
                "user" => $user
            ]);
        });
    }
}
