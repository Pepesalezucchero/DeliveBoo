<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this -> app -> singleton(Gateway :: class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'twmvqx3w3pnj3rps',
                    'publicKey' => 'hp8gjr7wxcbk2xpt',
                    'privateKey' => '51c5a66d58c6393b0a78fbfc186a5c90'
                ]
            );


            // $gateway = new Braintree\Gateway([
            //     'environment' => 'sandbox',
            //     'merchantId' => 'twmvqx3w3pnj3rps',
            //     'publicKey' => 'hp8gjr7wxcbk2xpt',
            //     'privateKey' => '51c5a66d58c6393b0a78fbfc186a5c90'
            //   ]);
        });
    }
}
