<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactToAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $subject = $this->data['subject'];
        $contact = $this->data['contact']; //admin
        $admin = $this->data['admin']; //
        return $this->from('support@dhss.edu.np')->view('mail.message_send_to_admin', compact('subject', 'admin', 'contact'))->subject($subject);
    }
}
