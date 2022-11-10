<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutIntroduction;
use App\Models\Backend\Teachers;
use App\Models\Backend\Timeline;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //jhukkina sakxa, eutai nam ko 2 ta controller banayiyexa... this is frontend/aboutcontroller hai

    public function Introduction()
    {
        $intro = AboutIntroduction::first();
        $teachersCount = Teachers::all()->count();
        //committee section sake paxi, count pathaune
        $page_title = "About Us";
        return view('frontend.about.about_introduction', compact('intro', 'teachersCount', 'page_title'));
    } //end method

    public function Teachers()
    {
        $teachers = Teachers::where('designation', '!=', 'principal')->get();
        $principal = Teachers::where('designation', 'principal')->first();
        $page_title = "Our Teachers";
        return view('frontend.about.teachers', compact('teachers', 'principal', 'page_title'));
    } //end method

    public function TeacherDetails($id)
    {
        $teacher = Teachers::findOrFail($id);
        $parent_page = "Our Teachers";
        $route = "frontend.about.teachers";
        $page_title = $teacher->name;
        return view('frontend.about.teacher_details', compact('teacher', 'parent_page', 'route', 'page_title'));
    } //end method

    public function Timelines()
    {
        $timelines = Timeline::orderBy('year', 'asc')->get();
        $parent_page = "Home";
        $route = "index";
        $page_title = "Our Journey";
        return view('frontend.about.timelines', compact('timelines', 'parent_page', 'route', 'page_title'));
    }
}
