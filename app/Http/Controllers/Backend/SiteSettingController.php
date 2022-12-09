<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    //SiteSetting

    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('admin.setting.setting_update', compact('setting'));
    } //end method 


    public function UpdateSiteSetting(Request $request)
    {
        $site_id = $request->id;
        $site = SiteSetting::findOrFail($site_id);
        // logo	phone_one	phone_two	email	school_name	school_address	facebook	twitter	linkedin	youtube website
        if ($request->file('logo')) {
            if ($site->logo != null) {
                @unlink($site->logo);
            }
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(150, 150)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;
            SiteSetting::findOrFail($site_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' =>  $request->email,
                'school_name' => $request->school_name,
                'logo' => $save_url,
                'school_address' =>  $request->school_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'website' => $request->website,
            ]);

            $notification = array(
                'message' => 'Site setting updated Successfully.',
                'alert-type' => 'info',

            );

            return redirect()->route('site.setting')->with($notification);
        } else {
            SiteSetting::findOrFail($site_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' =>  $request->email,
                'school_name' => $request->school_name,

                'school_address' =>  $request->school_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'website' => $request->website,
            ]);

            $notification = array(
                'message' => 'Site Settings updated Successfully.',
                'alert-type' => 'info',

            );

            return redirect()->route('site.setting')->with($notification);
        } //end else
    } //end method





}
