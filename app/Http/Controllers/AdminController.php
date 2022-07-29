<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin logout method
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    //admin profile method
    public function AdminProfile()
    {
        //do smthng
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    //admin profile edit
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    } //end method

    //admin profile edited store
    public function StoreProfile(Request $request)
    {
        //
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile updated Successfully.',
            'alert-type' => 'info',

        );
        return redirect()->route('admin.profile')->with($notification);
    } //end method
}
