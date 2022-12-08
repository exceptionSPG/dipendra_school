<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ContactToAdminMail;
use App\Mail\MessageReceivedToSenderMail;
use App\Models\Backend\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function mailsAll()
    {
        $mails = Contact::orderBY('id', 'ASC')->get();
        return view("admin.contact.all_emails", compact('mails'));
    } //end method

    public function MailReply($id)
    {
        $mail = Contact::findOrFail($id);
        return view("admin.contact.reply_mail", compact('mail'));
    } //end method


    public function MailDelete($id)
    {
        $mail = Contact::findOrFail($id);

        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Mail Deleted Successfully.',
            'alert-type' => 'success',

        );
        return redirect()->back()->with($notification);
    }



    /********************Frontend Contact code */
    public function ContactUs()
    {
        $page_title = "Contact Us";
        $parent_page = "Home";
        $route = "index";

        return view('frontend.contact.contact_us', compact('page_title', 'parent_page', 'route'));
    } //end method

    public function MailStore(Request $request)
    {
        //read data
        // title	image	date	author	detail	created_at
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ], [
            'name.required' => 'Your Name is required.',
            'email.required' => 'Your email is required.',
            'subject.required' => 'Subject is required.',
            'message.required' => 'Message is required.',

        ]);


        //store in db $order_id = Order::insertGetId
        $con_id = Contact::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);


        //send mail to sender
        if ($con_id) {
            //message stored in db, now send email to admin as well as sender.

            /** Send Mail Start */
            //to admin:
            $admin_mail = User::find(1);
            //Data to mail

            $contact = Contact::findOrFail($con_id);
            $data = [
                'contact' => $contact,
                'admin' => $admin_mail,
                'subject' => 'New Message received with Subject:' . $contact->subject,
            ];
            Mail::to($admin_mail)->send(new ContactToAdminMail($data));

            //to sender
            $data1 = [
                'contact' => $contact,
                'messages' => 'Thank you, ' . $contact->name . ', for getting in touch with us. We received your message : ' . $contact->message . '. We will get back to you soon.',
                'subject' => 'We received your message.',

            ];

            Mail::to($contact->email)->send(new MessageReceivedToSenderMail($data1));
            /*****************************END: SEND mail ****/
            //done.
            $notification = array(
                'message' => 'Your Message Sent Successfully.',
                'alert-type' => 'success',

            );
            return redirect()->back()->with($notification);
        } else {
            //done.
            $notification = array(
                'message' => 'Problem occured while sending message. Please try again later.',
                'alert-type' => 'failure',

            );
            return redirect()->back()->with($notification);
        }
    } //end method

}
