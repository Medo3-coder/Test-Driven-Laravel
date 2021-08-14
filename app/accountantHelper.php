<?php

namespace App ;

class accountantHelper  {

    function finding($amount){
        $profitPercent = 10 ;
        return $profitPercent * $amount / 100 ;
    }

}
