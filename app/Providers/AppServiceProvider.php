<?php

namespace App\Providers;

use App\billing\BankPaymentGateway;
use App\billing\CreditBankPaymentGateway;
use App\billing\PaymentGatewayContract;
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
        // we do this because of model binding
        $this->app->singleton(PaymentGatewayContract::class, function ($app){
            if(request()->has('credit'))
            {
                return new CreditBankPaymentGateway('usd');
            }
                  return new BankPaymentGateway('usd');

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
