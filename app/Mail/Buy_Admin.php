<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Buy_Admin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $cartitems, $subtotal)
    {
        $this->user = $user;
        $this->cartitems = $cartitems;
        $this->subtotal = $subtotal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->view('buy.mail_admin')
          ->subject('You Got a Order from '.$this->user->name)
          ->with(['user' => $this->user, 'cartitems' => $this->cartitems, 'subtotal' => $this->subtotal]);
    }
}
