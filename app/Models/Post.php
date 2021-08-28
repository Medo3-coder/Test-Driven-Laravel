<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

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


    //refactor
    protected static function allPosts()
    {
       return $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\MaxCount::class,
            ])->thenReturn()->paginate(5);

    }
}
