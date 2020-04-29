<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Requests\ContactUsRequest;
use App\User;

class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUsRequest $request,$user=null)
    {
        $this->request=$request;

        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          $mail=$this->view('mail.ContactUs')->with([
            'user'        => $this->user,
            'request'=>$this->request,
           

        ])->to('britishalsi@gmail.com')->from('britishalsi@gmail.com', 'UserContactUs')->subject('UserContactUs');
         return $mail;
    }
}
