<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BhupuBidhyarthi;
use App\Models\Backend\BiByaSa;
use App\Models\Backend\Committee;
use App\Models\Backend\SiAwSa;
use Illuminate\Http\Request;

class FrCommitteeController extends Controller
{
    //
    public function BiByaSaShow()
    {
        $bibyasa = Committee::find(1);
        $members = BiByaSa::all();
        $page_title = "बिद्यालय व्यवस्थापन समिति";
        $parent_page = "Home";
        $route = "index";
        return view('frontend.committee.bibyasa', compact('bibyasa', 'members', 'page_title', 'parent_page', 'route'));
    } //end method
    public function SiAwSaShow()
    {
        $siawsa = Committee::find(2);
        $members = SiAwSa::all();
        $page_title = "शिक्षक अभिभावक संघ";
        $parent_page = "Home";
        $route = "index";
        return view('frontend.committee.siawsa', compact('siawsa', 'members', 'page_title', 'parent_page', 'route'));
    } //end method
    public function BhupuBidhyarthiShow()
    {
        $bhupu = Committee::find(3);
        $members = BhupuBidhyarthi::all();
        $page_title = "भूपू बिद्यार्थी संघ";
        $parent_page = "Home";
        $route = "index";
        return view('frontend.committee.bhupu_bidhyarthi', compact('bhupu', 'members', 'page_title', 'parent_page', 'route'));
    } //end method
}
