<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupLink extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private $signupLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $link)
    {
        $this->signupLink = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.signup',['signuplink'=>$this->signupLink]);
    }
}
