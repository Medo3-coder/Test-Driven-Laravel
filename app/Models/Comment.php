<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    use HasFactory;

    //Comment belong to post but post can have many comment    : one to many polymorphic relation

    public function commentable()
    {
       return $this->morphTo();
    }
}

