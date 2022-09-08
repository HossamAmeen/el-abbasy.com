<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $number;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $number, $order_type)
    {
        $this->email = $email;
        $this->name = $name;
        $this->number = $number;
        $this->type = $order_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Order was submitted')
        ->markdown('emails.orders');
    }
}
