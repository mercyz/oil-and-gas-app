<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ContactMail;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    public $contactMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMail $contactMail)
    {
        $this->contactMail = $contactMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address'=>'mercy4hope@gmail.com', 'name'=> 'APP_NAME'])
        ->view('pages.front.contact.message')
        ->with([
            'name' => $this->contactMail->name,
            'email' => $this->contactMail->email,
            'phone' => $this->contactMail->phone,
            'messages' => $this->contactMail->messages,
        ]);
    }
}
