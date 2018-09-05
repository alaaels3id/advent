<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class ProductsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('App\Http\Interfaces\ProductsRepositoryInterface','App\Http\Elequent\ProductsRepository');
    }
}
