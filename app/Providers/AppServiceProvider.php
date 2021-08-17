<?php

namespace App\Providers;

use App\billing\BankPaymentGateway;
use App\billing\CreditBankPaymentGateway;
use App\billing\PaymentGatewayContract;
use App\Http\Views\Composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
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
        // option 1 - every single view
        //  View::share('channels',Channel::orderBy('name')->get());


//----------------------------------------------------------------------------------
        // option 2 - granular views with wildcards

        // wild card be like ['post.*'] all
        //the use of view composer
        // the difference in attach the specific view who take the data
       // View::composer(['post.create','channels.index'],function ($view){

        //    $view->with('channels',Channel::orderBy('name')->get());

      //  });



        //----------------------------------------------------------------------------------

       // option 3 - dedicated class
       // attach the specific view who take the data but with dedicated class
        View::composer(['post.create','channels.index'] , ChannelsComposer::class);
    }
}
