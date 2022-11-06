<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Bisesta;
use Illuminate\Http\Request;

class BisestaController extends Controller
{
    //
    public function BisestaView()
    {
        $bisesta = Bisesta::latest()->get();
        return view('admin.bisesta.view_bisesta', compact('bisesta'));
    } //end method

    public function BisestaStore(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',

        ], [
            'title.required' => 'Input Category English Name',
            'description.required' => 'Input Category Nepali Name',
        ]);


        Bisesta::insert([
            'title' => $request->title,
            'description' => $request->description,

            'icon' => $request->icon,
        ]);

        $notification = array(
            'message' => 'Bisesta Added Successfully.',
            'alert-type' => 'success',

        );

        return redirect()->back()->with($notification);
    } //end method

    public function BisestaEdit($id)
    {
        $bisesta = Bisesta::findOrFail($id);
        return view('admin.bisesta.bisesta_edit', compact('bisesta'));
    }

    public function BisestaUpdate(Request $request)
    {
        $id = $request->id;

        Bisesta::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,

            'icon' => $request->icon,
        ]);

        $notification = array(
            'message' => 'Bisesta updated Successfully.',
            'alert-type' => 'info',

        );

        return redirect()->route('dipendra.bisesta')->with($notification);
    } //end method

    public function BisestaDelete($id)
    {
        //
        $cat = Bisesta::findOrFail($id);


        Bisesta::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Bisesta Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    }
}
