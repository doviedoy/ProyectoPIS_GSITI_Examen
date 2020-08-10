<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Usuario y Clave para el portal de TESIS-UNSA';
    public $Usuario;
    public $ClaveAutomatica;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Usuario, $ClaveAutomatica)
    {
        $this->Usuario = $Usuario;
        $this->ClaveAutomatica = $ClaveAutomatica;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.messageMail');
    }
}
