<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    use HasFactory;

    //Comment belong to video

    // commentable function is in the parent model

    public function commentable()
    {
       return $this->morphTo();
    }
}

