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

            // if (request()->is('countries*')) {
            //     $currentPage = 'Countries';
            // } elseif (request()->is('states*')) {
            //     $currentPage = 'States';
            // } elseif (request()->is('allUsers*')) {
            //     $currentPage = 'All Users';
            // } elseif (request()->is('status*')) {
            //     $currentPage = 'Property Status';
            // } elseif (request()->is('type*')) {
            //     $currentPage = 'Property Type';
            // } elseif (request()->is('amenity*')) {
            //     $currentPage = 'Property Amenity';
            // } elseif (request()->is('properties*')) {
            //     $currentPage = 'Properties';
            // } elseif (request()->is('properties/trashed*')) {
            //     $currentPage = 'Trashed Properties';
            // }

            $view->with('currentPage', $currentPage);
        });
    }
}
