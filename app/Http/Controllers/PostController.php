<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
           //remove the query and share it by app service provider

        return view('post.create');
    }

    //   $channels = Channel::orderBy('name')->get();   to make by alphabetical order
}

