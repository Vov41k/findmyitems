<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $mail=$this->view('mail.ConfirmRegistration')->with([
            'user'        => $this->user,
           

        ])->to($this->user->email)->from('britishalsi@gmail.com', 'ConfirmRegistration')->subject('ConfirmRegistration');
         return $mail;
    }
}
