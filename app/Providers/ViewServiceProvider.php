<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('dashboard.*', function ($view) {
            $currentPage = 'Dashboard'; // Default page

             if (request()->is('products*')) {
                 $currentPage = 'Products';
             } 

            $view->with('currentPage', $currentPage);
        });
    }
}
