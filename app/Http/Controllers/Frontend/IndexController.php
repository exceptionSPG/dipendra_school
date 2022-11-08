<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutIntroduction;
use App\Models\Backend\Bisesta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Index()
    {
        $about = AboutIntroduction::find(1);
        $bisestas = Bisesta::latest()->limit(4)->get();
        return view('frontend.index', compact('about', 'bisestas'));
    }
}
