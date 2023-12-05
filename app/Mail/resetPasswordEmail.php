<?php

namespace App\Mail;

use App\User;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class resetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pass, $email; 

    public function __construct($pass, $email)
    {
        $this->pass = $pass;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Password')->view('email.password')->with('new_pass', $this->pass)->to($this->email);
    }
}
