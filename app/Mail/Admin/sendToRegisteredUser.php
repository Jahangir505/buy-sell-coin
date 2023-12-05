<?php

namespace App\Mail\Admin;

use App\User;
use App\Models\Deposit;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendToRegisteredUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $subject,$content, $user; 

    public function __construct($subject, $content ,User $user)
    {
        $this->content = $content;
        $this->subject = $subject;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('email.admin.email')->with('content', $this->content)->with('content', $this->content)->to($this->user->email);
    }
}