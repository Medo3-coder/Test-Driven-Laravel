<?php

namespace App;

class Cart {

    protected  $item = [];
    public  function  insert($item)
    {
        $this->item[] = $item ;
    }

    public  function count()
    {
        return count($this->item);
    }

    public function  getItems()
    {
        return $this->item;
    }

    public  function  total()
    {
        $amount = 0 ;
        foreach ($this->item as $itm)
        {
            $amount += $itm['price'] * $itm['qty'] ;
        }

        return $amount ;
    }
}
