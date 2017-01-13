<?php

namespace App\Mail;

use App\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_form;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactForm $contact_form)
    {
        $this->contact_form = $contact_form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_form');
    }
}
