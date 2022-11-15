<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BlogsController extends Controller
{
    //
    public function BlogsAll()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } //end method

    public function BlogsAdd()
    {
        return view('admin.blogs.blogs_add');
    } //end method

    public function BlogStore(Request $request)
    {

        // title	image	date	author	detail	created_at
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'author' => 'required',
            'image' => 'required',

        ], [
            'title.required' => 'Teacher Title is required.',
            'detail.required' => 'detail is required.',
            'date.required' => 'Date is required.',
            'author.required' => 'author is required.',
            'image.required' => 'image is required.',


        ]);


        $image = $request->file('image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1172, 648)->save('upload/blogs/' . $name_generate);
        $save_url = 'upload/blogs/' . $name_generate;

        Blog::insert([
            'title' => $request->title,
            'detail' => $request->detail,
            'date' => $request->date,
            'author' => $request->author,
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Blog Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('blogs.all')->with($notification);
    } //end method
    public function BlogEdit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.blogs_edit', compact('blog'));
    } //end method

    public function BlogUpdate(Request $request)
    {

        $id = $request->id;
        $data = Blog::findOrFail($id);

        if ($request->file('image')) {
            $old_image = $data->photo;
            @unlink(public_path($old_image));
            $image = $request->file('image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1172, 648)->save('upload/blogs/' . $name_generate);
            $save_url = 'upload/blogs/' . $name_generate;

            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'detail' => $request->detail,
                'date' => $request->date,
                'author' => $request->author,
                'image' => $save_url,
                'updated_at' => Carbon::now(),


            ]);
            $notification = array(
                'message' => 'Blog Data updated with image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('blogs.all')->with($notification);
        } else {

            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'detail' => $request->detail,
                'date' => $request->date,
                'author' => $request->author,
                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Blog Data  updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('blogs.all')->with($notification);
        }
    } //end method


    public function BlogsDelete($id)
    {

        $blog = Blog::findOrFail($id);
        $image = $blog->image;
        @unlink(public_path($image));

        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    } //end method4


}
