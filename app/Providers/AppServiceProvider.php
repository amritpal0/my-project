<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layout.app', function($view) {
            $detail = User::find(auth()->user()->id);
            $view->with(['detail' => $detail]);
        });
    }
}
