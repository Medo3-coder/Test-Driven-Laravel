<?php


namespace App\Mixins;


class SrtMixins    // i forgot to make it str  hahhahah xd
{
    public function PartNumber()
    {
        //part store in macros array thats why i not passed it in functions

        return function ($part){

            return 'AB-' . substr($part , 0 , 3) .'-'. substr($part ,3);
        };
    }

    public function Prefix()
    {
        return function ($string , $prefix = 'AB-'){
            return $string . $prefix ;
        };
    }

}
