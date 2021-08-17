<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public  function  index()
    {
        //remove the query and share it by app service provider

        return view('channels.index');
    }
}
