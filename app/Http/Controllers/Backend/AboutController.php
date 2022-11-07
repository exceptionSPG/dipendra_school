<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutIntroduction;
use App\Models\Backend\Teachers;
use App\Models\Backend\Timeline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //
    public function IntroductionView()
    {
        $intro = AboutIntroduction::find(1);
        return view('admin.about.introduction_view', compact('intro'));
    } //end method

    public function IntroductionUpdate(Request $request)
    {
        $intro_id = $request->id;
        $data = AboutIntroduction::findOrFail($intro_id);

        if ($request->file('thumbnail')) {
            $old_image = $data->thumbnail;
            @unlink(public_path($old_image));
            $file = $request->file('thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();

            Image::make($file)->resize(869, 461)->save('upload/thumbnails/' . $filename);
            $save_url = 'upload/thumbnails/' . $filename;

            AboutIntroduction::findOrFail($intro_id)->update([
                'description' => $request->description,
                'mission' => $request->mission,
                'vision' => $request->vision,
                'thumbnail' => $save_url,
            ]);
            $notification = array(
                'message' => 'About updated with Image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->back()->with($notification);
        } else {
            AboutIntroduction::findOrFail($intro_id)->update([
                'description' => $request->description,
                'mission' => $request->mission,
                'vision' => $request->vision,

            ]);
            $notification = array(
                'message' => 'About updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->back()->with($notification);
        }
    } //end method

    public function TeachersView()
    {
        $teachers = Teachers::all();
        return view('admin.about.teachers.teachers_all', compact('teachers'));
    } //end method

    public function TeachersAdd()
    {
        return view('admin.about.teachers.teacher_add');
    } //end method

    public function TeacherStore(Request $request)
    {
        // name	designation	description	photo	email	phone	facebook	instagram	youtube	address	interests	qualification	experience	biography	mfs	since
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'biography' => 'required',

        ], [
            'name.required' => 'Teacher Name is required.',
            'designation.required' => 'Designation is required.',
            'photo.required' => 'Photo is required.',
            'description.required' => 'Description is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone is required.',
            'address.required' => 'Address is required.',
            'qualification.required' => 'Qualification is required.',
            'experience.required' => 'Experience is required.',
            'biography.required' => 'Biography is required.',

        ]);


        $image = $request->file('photo');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(371, 418)->save('upload/teachers/' . $name_generate);
        $save_url = 'upload/teachers/' . $name_generate;

        Teachers::insert([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'interests' => $request->interests,
            'biography' => $request->biography,
            'mfs' => $request->mfs,
            'since' => $request->since,
            'photo' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Teacher Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('teachers.view')->with($notification);
    } //end method


    public function TeacherEdit($id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('admin.about.teachers.teacher_edit', compact('teacher'));
    } //end method

    public function TeacherUpdate(Request $request)
    {
        $id = $request->id;
        $data = Teachers::findOrFail($id);

        if ($request->file('photo')) {
            $old_image = $data->photo;
            @unlink(public_path($old_image));
            $image = $request->file('photo');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(371, 418)->save('upload/teachers/' . $name_generate);
            $save_url = 'upload/teachers/' . $name_generate;

            Teachers::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'qualification' => $request->qualification,
                'experience' => $request->experience,
                'interests' => $request->interests,
                'biography' => $request->biography,
                'mfs' => $request->mfs,
                'since' => $request->since,
                'photo' => $save_url,
                'updated_at' => Carbon::now(),


            ]);
            $notification = array(
                'message' => 'Teacher Data updated with image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('teachers.view')->with($notification);
        } else {

            Teachers::findOrFail($id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'qualification' => $request->qualification,
                'experience' => $request->experience,
                'interests' => $request->interests,
                'biography' => $request->biography,
                'mfs' => $request->mfs,
                'since' => $request->since,

                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Teacher Data  updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('teachers.view')->with($notification);
        }
    } //end method TeacherDelete

    public function TeacherDelete($id)
    {
        $teacher = Teachers::findOrFail($id);
        $image = $teacher->photo;
        @unlink(public_path($image));

        Teachers::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Teacher Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    }

    public function TimelineView()
    {
        $timelines = Timeline::all();
        return view('admin.about.timeline.timeline_all', compact('timelines'));
    } //end method

    public function TimelineStore(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',


        ], [
            'year.required' => 'Timeline Year is required.',
            'title.required' => 'Title is required.',
            'description.required' => 'Description is required.',

        ]);

        Timeline::insert([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Timeline Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('timeline.view')->with($notification);
    } //end method

    public function TimelineEdit($id)
    {
        $timeline = Timeline::findOrFail($id);
        return view('admin.about.timeline.timeline_edit', compact('timeline'));
    } //end method

    public function TimelineUpdate(Request $request)
    {
        $id = $request->id;

        Timeline::findOrFail($id)->update([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Timeline Data updated Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('timeline.view')->with($notification);
    } //end method

    public function TimelineDelete($id)
    {
        Timeline::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Timeline Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    }
}
