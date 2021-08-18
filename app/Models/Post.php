<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

    use HasFactory;
    public  function image()
    {
        return $this->morphOne(Image::class , 'imageable' );
    }

    public function comments()
    {
        //post can have many comment
        return $this->morphMany(Comment::class,'commentable');
    }


    // a post can have many Tags

    public  function  tags()
    {
         return $this->morphToMany(Tag::class,'taggable');
    }
}
