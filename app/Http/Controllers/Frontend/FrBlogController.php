<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrBlogController extends Controller
{
    //
    public function Blogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);
        $page_title = "Latest News";
        $parent_page = "Home";
        $route = "index";

        return view('frontend.blogs.blogs', compact('blogs', 'page_title', 'parent_page', 'route'));
    } //end method 

    public function BlogDetails($id)
    {
        $blog = Blog::find($id);
        $page_title = $blog->title;
        $parent_page = "Latest News";
        $route = "news";

        return view('frontend.blogs.blog_details', compact('blog', 'page_title', 'parent_page', 'route'));
    }
}
