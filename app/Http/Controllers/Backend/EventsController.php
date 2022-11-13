<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class EventsController extends Controller
{
    //
    public function EventsAll()
    {
        $events = Event::where('date', '>=', Carbon::now()->format('Y-m-d'))->get();
        return view('admin.events.events_all', compact('events'));
    } //end method 

    public function EventsAdd()
    {
        return view('admin.events.events_add');
    } //end method 

    public function EventsStore(Request $request)
    {
        // title	description	date	time	location	status	thumbnail
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'thumbnail' => 'required',


        ], [
            'title.required' => 'Teacher Title is required.',
            'description.required' => 'Description is required.',
            'date.required' => 'Date is required.',
            'time.required' => 'Time is required.',
            'location.required' => 'Location is required.',
            'thumbnail.required' => 'Thumbnail is required.',


        ]);


        $image = $request->file('thumbnail');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(371, 418)->save('upload/events/' . $name_generate);
        $save_url = 'upload/events/' . $name_generate;

        Event::insert([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Event Data Inserted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->route('events.all')->with($notification);
    } //end method EventsStore

    public function EventsEdit($id)
    {
        $event = Event::find($id);
        return view('admin.events.events_edit', compact('event'));
    } //end method

    public function EventsUpdate(Request $request)
    {
        $id = $request->id;
        $data = Event::findOrFail($id);

        if ($request->file('thumbnail')) {
            $old_image = $data->photo;
            @unlink(public_path($old_image));
            $image = $request->file('thumbnail');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(371, 418)->save('upload/events/' . $name_generate);
            $save_url = 'upload/events/' . $name_generate;

            Event::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'thumbnail' => $save_url,
                'updated_at' => Carbon::now(),


            ]);
            $notification = array(
                'message' => 'Event Data updated with image Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('events.all')->with($notification);
        } else {

            Event::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Member Data  updated Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->route('events.all')->with($notification);
        }
    }

    public function EventsDelete($id)
    {

        $member = Event::findOrFail($id);
        $image = $member->photo;
        @unlink(public_path($image));

        Event::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Event Data Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    } //end method4


    public function ExpiredEventsAll()
    {
        $events = Event::where('date', '<', Carbon::now()->format('Y-m-d'))->get();
        return view('admin.events.expired_events_all', compact('events'));
    }
}
