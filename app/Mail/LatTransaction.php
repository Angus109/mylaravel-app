<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LatTransaction extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public $sender_wallet;
    public function __construct($id, $sender_wallet)
    {
        $this->id       = $id;
        $this->sender_wallet = $sender_wallet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('LilyAdd LAT Transfer')
        ->markdown('mails.lat_transaction');
    }
}
