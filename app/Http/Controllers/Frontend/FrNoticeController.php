<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Notice;
use Illuminate\Http\Request;

class FrNoticeController extends Controller
{
    public function Notices()
    {
        $notices = Notice::orderBy('notice_date', 'desc')->limit(10)->get();
        $page_title = "Notices";
        $parent_page = "Home";
        $route = "index";

        return view('frontend.notices.notices', compact('notices', 'page_title', 'parent_page', 'route'));
    } //end method 

    public function NoticeDetails($id)
    {
        $notice = Notice::find($id);
        $page_title = $notice->title;
        $parent_page = "Notices";
        $route = "notices";

        return view('frontend.notices.notice_details', compact('notice', 'page_title', 'parent_page', 'route'));
    }
}
