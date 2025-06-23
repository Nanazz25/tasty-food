<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KontakMasukMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kontak;

    /**
     * Create a new message instance.
     */
    public function __construct($kontak)
    {
        $this->kontak = $kontak;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Pesan Baru dari Form Kontak')
                    ->view('emails.kontak');
    }

}
