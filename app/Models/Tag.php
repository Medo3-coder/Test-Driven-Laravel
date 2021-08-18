<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    use HasFactory;

    // make tage for posts
    public  function posts()
    {
        return $this->morphedByMany(Post::class , 'taggable');
    }

    // make tage for videos
    public  function videos()
    {
        return $this->morphedByMany(Video::class , 'taggable');
    }
}
