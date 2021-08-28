<?php


namespace App\QueryFilters;

use Closure;

class Sort extends  Filter
{


    protected function applayFilter($builder)
    {
        return  $builder->orderBy('title' , request($this->filterName()));
    }
}
