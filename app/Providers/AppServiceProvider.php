<?php

namespace App\Providers;

use App\billing\BankPaymentGateway;
use App\billing\CreditBankPaymentGateway;
use App\billing\PaymentGatewayContract;
use App\Http\Views\Composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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

        Str::macro('partNumber' , function ($part){

            return 'AB-' . substr($part , 0 , 3) .'-'. substr($part ,3);
        });



        //----------------------------------------------------------------------------------

       // option 3 - dedicated class
       // attach the specific view who take the data but with dedicated class


        // the new is we extract our files to partials file and send it in by composers


        View::composer('partials.channels.*' , ChannelsComposer::class);
    }
}
