<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Orderplaced extends Mailable
{
    use Queueable, SerializesModels;

    public $emaildata;
    /**
     * Create a new message instance.
     *
     * @param array $emailData
     */

    public function __construct(array $emaildata)
    {
        $this->emaildata = $emaildata;
    }

    public function build()
    {
        return $this->view('email/email')
                    ->with('data', $this->emaildata);
    }
                
}
