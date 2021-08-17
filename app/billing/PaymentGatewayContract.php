<?php

namespace App\billing;

interface PaymentGatewayContract
{
    public function charge($amount);

    public function setDiscount($amount);
}
