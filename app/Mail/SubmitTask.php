<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmitTask extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $fileUpload;
    public $user;

    public function __construct($fileUpload , $user)
    {
        $this->fileUpload = $fileUpload;
        $this->user       = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('LilyAdd Task Submition')
        ->markdown('mails.submit_task');
    }
}
