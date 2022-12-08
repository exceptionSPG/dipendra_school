<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Contact;
use Illuminate\Http\Request;

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
}
