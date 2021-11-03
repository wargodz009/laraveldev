<?php

namespace App\Jobs;

use App\Mail\SignupLink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendSignupMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $signupLink;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $signupLink,string $to)
    {
        $this->signupLink = $signupLink;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() : void
    {
        Mail::to($this->to)->send(new SignupLink($this->signupLink));
    }
}
