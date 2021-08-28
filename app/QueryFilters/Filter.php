<?php


namespace App\QueryFilters;
use Closure;
use Illuminate\Support\Str;

abstract class Filter
{

    public function handle($request , Closure $next)
    {
        if (! request()->has($this->filterName())){
            return $next($request);
        }

        $builder = $next($request);

        return $this->applayFilter( $builder);


    }





   protected abstract function applayFilter($builder);

    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }
}
