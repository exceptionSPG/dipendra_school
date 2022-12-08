<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Notice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    //
    public function NoticeAll()
    {
        $notices = Notice::orderBy('notice_date', 'desc')->get();
        return view('admin.notice.notice_all', compact('notices'));
    } //end method

    public function NoticeAdd()
    {
        return view('admin.notice.notice_add');
    } //end method

    public function NoticeStore(Request $request)
    {

        // title	description	notice_date
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'notice_date' => 'required',


        ], [
            'title.required' => 'Teacher Title is required.',
            'description.required' => 'Description is required.',
            'notice_date.required' => 'Notice Date is required.',



        ]);



        Notice::insert([
            'title' => $request->title,
            'description' => $request->description,
            'notice_date' => $request->notice_date,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Notice Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('notice.all')->with($notification);
    } //end method
    public function NoticeEdit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.notice_edit', compact('notice'));
    } //end method

    public function NoticeUpdate(Request $request)
    {

        $id = $request->id;


        Notice::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'notice_date' => $request->notice_date,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Notice Data updated Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('notice.all')->with($notification);
    } //end method


    public function NoticeDelete($id)
    {

        Notice::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Notice Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    } //end method4


}
