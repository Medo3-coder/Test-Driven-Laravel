<?php


namespace App\QueryFilters;

use Closure;

class MaxCount extends Filter
{


    protected function applayFilter($builder)
    {
      return $builder->take(request($this->filterName()));
    }
}
