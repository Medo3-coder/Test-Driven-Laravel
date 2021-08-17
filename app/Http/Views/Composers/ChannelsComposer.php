<?php



namespace App\Http\Views\Composers;


use App\Models\Channel;
use Illuminate\View\View;    // look to what imported

class ChannelsComposer
{
    // now encapsulated this in it's own class
    public function compose(View  $view)
    {
        $view->with('channels',Channel::orderBy('name')->get());
    }

}
