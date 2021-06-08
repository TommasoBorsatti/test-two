<?php

namespace App\Providers;

use Braintree\Configuration;
use Illuminate\Support\ServiceProvider;

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
        
        Configuration::environment(env('BTREE_ENVIRONMENT'));
        Configuration::merchantId(env('BTREE_MERCHANT_ID'));
        Configuration::publicKey(env('BTREE_PUBLIC_KEY'));
        Configuration::privateKey(env('BTREE_PRIVATE_KEY'));
    }
}
