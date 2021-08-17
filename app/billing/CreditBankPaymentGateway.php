<?php


namespace App\billing;


use Illuminate\Support\Str;

class CreditBankPaymentGateway implements PaymentGatewayContract
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


        $fee = $amount * 0.03 ;

        return [

            'amount' => ($amount - $this->discount) + $fee,
            'confirmation_number' => Str::random(),
            'currency'=>$this->currency,
            'Discount' => $this->discount,
            'fee'     => $fee
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount =$amount;
    }
}
