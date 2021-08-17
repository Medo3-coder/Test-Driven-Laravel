<?php

namespace App\Http\Controllers;

use App\billing\BankPaymentGateway;
use App\billing\PaymentGatewayContract;
use App\orders\ordersDetails;
use Illuminate\Http\Request;

class payOrderController extends Controller
{
    public function store(ordersDetails $ordersDetails , PaymentGatewayContract $paymentGateway)
    {
       $order =  $ordersDetails->all();

        dd($paymentGateway->charge(2500 ));
    }
}
