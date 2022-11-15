<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutIntroduction;
use App\Models\Backend\Bisesta;
use App\Models\Backend\Committee;
use App\Models\Backend\Event;
use App\Models\Backend\Teachers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Index()
    {
        $committee = Committee::all();
        $teachers = Teachers::all();
        $events = Event::where('date', '>=', Carbon::now()->format('Y-m-d'))->limit(3)->get();
        $about = AboutIntroduction::find(1);
        $bisestas = Bisesta::latest()->limit(4)->get();
        return view('frontend.index', compact('about', 'bisestas', 'events', 'committee', 'teachers'));
    }
}
