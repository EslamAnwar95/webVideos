<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $contactMessage;

     protected $replayMessage ;
    public function __construct($contactMessage ,$replayMessage)
    {
        $this->contactMessage = $contactMessage;
        $this->replayMessage = $replayMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $replayMessage = $this->replayMessage;
        $contactMessage = $this->contactMessage;
        return $this->to($contactMessage->email)
        ->view('back-end.mails.replay-message' , compact('contactMessage' , 'replayMessage'));
    }
}
