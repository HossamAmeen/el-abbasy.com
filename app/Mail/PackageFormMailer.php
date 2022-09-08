<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageFormMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $number)
    {
        $this->email = $email;
        $this->name = $name;
        $this->number = $number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New package form was submitted')
        ->markdown('emails.package_forms');
    }
}
