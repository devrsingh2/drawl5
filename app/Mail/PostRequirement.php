<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostRequirement extends Mailable
{
    use Queueable, SerializesModels;

    public $requirement;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requirement)
    {
        $this->requirement = $requirement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.posted-requirement');
    }
}
