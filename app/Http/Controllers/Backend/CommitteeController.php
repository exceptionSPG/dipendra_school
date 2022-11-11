<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BiByaSa;
use App\Models\Backend\Committee;
use App\Models\Backend\SiAwSa;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    //
    public function CommitteeView()
    {
        $committees = Committee::all();
        return view('admin.committees.committee_view', compact('committees'));
    } //end method

    public function CommitteeEdit($id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.committees.committee_edit', compact('committee'));
    } //end method

    public function CommitteeUpdate(Request $request)
    {
        $id = $request->id;
        $data = Committee::findOrFail($id);

        if ($request->file('thumbnail')) {
            $old_image = $data->thumbnail;
            @unlink(public_path($old_image));
            $file = $request->file('thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();

            Image::make($file)->resize(869, 461)->save('upload/thumbnails/committee/' . $filename);
            $save_url = 'upload/thumbnails/committee/' . $filename;

            Committee::findOrFail($id)->update([
                'about' => $request->about,
                'name' => $request->name,
                'mission' => $request->mission,
                'vision' => $request->vision,
                'thumbnail' => $save_url,
            ]);
            $notification = array(
                'message' => 'Details updated with Image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->back()->with($notification);
        } else {
            Committee::findOrFail($id)->update([
                'about' => $request->about,
                'name' => $request->name,
                'mission' => $request->mission,
                'vision' => $request->vision,

            ]);
            $notification = array(
                'message' => 'Details updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->back()->with($notification);
        }
    } //end method

    public function BibyasaView()
    {
        $bibyasas = BiByaSa::all();
        return view('admin.committees.bibyasa.bibyasa_view', compact('bibyasas'));
    } //end method
    public function BibyasaAdd()
    {
        return view('admin.committees.bibyasa.bibyasa_add');
    } //end method

    public function BibyasaStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profession' => 'required',


        ], [
            'name.required' => 'Teacher Name is required.',
            'designation.required' => 'Designation is required.',
            'photo.required' => 'Photo is required.',
            'phone.required' => 'Phone is required.',
            'address.required' => 'Address is required.',
            'profession.required' => 'profession is required.',


        ]);


        $image = $request->file('photo');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(371, 418)->save('upload/bibyasa/' . $name_generate);
        $save_url = 'upload/bibyasa/' . $name_generate;

        BiByaSa::insert([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'profession' => $request->profession,
            'photo' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Member Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('bibyasa.all')->with($notification);
    } //end method


    public function BibyasaEdit($id)
    {
        $member = BiByaSa::findOrFail($id);
        return view('admin.committees.bibyasa.bibyasa_edit', compact('member'));
    } //end method

    public function BibyasaUpdate(Request $request)
    {
        $id = $request->id;
        $data = BiByaSa::findOrFail($id);

        if ($request->file('photo')) {
            $old_image = $data->photo;
            @unlink(public_path($old_image));
            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(371, 418)->save('upload/bibyasa/' . $name_generate);
            $save_url = 'upload/bibyasa/' . $name_generate;

            BiByaSa::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'profession' => $request->profession,
                'photo' => $save_url,
                'updated_at' => Carbon::now(),


            ]);
            $notification = array(
                'message' => 'Member Data updated with image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('bibyasa.all')->with($notification);
        } else {

            BiByaSa::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'profession' => $request->profession,

                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Member Data  updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('bibyasa.all')->with($notification);
        }
    } //end method


    public function BibyasaDelete($id)
    {
        $member = BiByaSa::findOrFail($id);
        $image = $member->photo;
        @unlink(public_path($image));

        BiByaSa::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Member Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    } //end method 



    public function SiawsaView()
    {
        $siawsas = SiAwSa::all();
        return view('admin.committees.siawsa.siawsa_view', compact('siawsas'));
    } //end method
    public function SiawsaAdd()
    {
        return view('admin.committees.siawsa.siawsa_add');
    } //end method

    public function SiawsaStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profession' => 'required',


        ], [
            'name.required' => 'Teacher Name is required.',
            'designation.required' => 'Designation is required.',
            'photo.required' => 'Photo is required.',
            'phone.required' => 'Phone is required.',
            'address.required' => 'Address is required.',
            'profession.required' => 'profession is required.',


        ]);


        $image = $request->file('photo');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(371, 418)->save('upload/siawsa/' . $name_generate);
        $save_url = 'upload/siawsa/' . $name_generate;

        SiAwSa::insert([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'profession' => $request->profession,
            'photo' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Member Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('siawsa.all')->with($notification);
    } //end method


    public function SiawsaEdit($id)
    {
        $member = SiAwSa::findOrFail($id);
        return view('admin.committees.siawsa.siawsa_edit', compact('member'));
    } //end method

    public function SiawsaUpdate(Request $request)
    {
        $id = $request->id;
        $data = SiAwSa::findOrFail($id);

        if ($request->file('photo')) {
            $old_image = $data->photo;
            @unlink(public_path($old_image));
            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(371, 418)->save('upload/siawsa/' . $name_generate);
            $save_url = 'upload/siawsa/' . $name_generate;

            SiAwSa::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'profession' => $request->profession,
                'photo' => $save_url,
                'updated_at' => Carbon::now(),


            ]);
            $notification = array(
                'message' => 'Member Data updated with image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('siawsa.all')->with($notification);
        } else {

            SiAwSa::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'profession' => $request->profession,

                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Member Data  updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('siawsa.all')->with($notification);
        }
    } //end method


    public function SiawsaDelete($id)
    {
        $member = SiAwSa::findOrFail($id);
        $image = $member->photo;
        @unlink(public_path($image));

        SiAwSa::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Member Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    } //end method

}
