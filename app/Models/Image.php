<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];
    use HasFactory;

    // this one to one polymorphic relation 
    public function imageable()
    {
        return $this->morphTo();
    }
}
