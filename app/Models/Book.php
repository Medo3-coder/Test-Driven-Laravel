<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
   protected $guarded =[];

   //make a path to redirect
   public function path()
   {

       return '/books/' . $this->id ;   // books/1-enders-game
   }

}
