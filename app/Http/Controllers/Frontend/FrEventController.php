<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrEventController extends Controller
{
    //
    public function Events()
    {
        $events = Event::where('date', '>=', Carbon::now()->format('Y-m-d'))->get();
        $page_title = "Upcoming Events";
        $parent_page = "Home";
        $route = "index";

        return view('frontend.events.events', compact('events', 'page_title', 'parent_page', 'route'));
    } //end method 

    public function EventDetails($id)
    {
        $event = Event::find($id);
        $page_title = $event->title;
        $parent_page = "Upcoming Events";
        $route = "events";

        return view('frontend.events.event_details', compact('event', 'page_title', 'parent_page', 'route'));
    }
}
