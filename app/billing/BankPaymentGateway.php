<?php


namespace App\billing;


use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{

    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }



    public  function  charge($amount)
    {
        // Charge The Bank

        return [

            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency'=>$this->currency,
            'Discount' => $this->discount
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount =$amount;
    }
}
