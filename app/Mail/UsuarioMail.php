<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsuarioMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Pedido Realizado';
    public $nombres;
    public $total_venta;
    public $telefono;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombres,$total_venta,$telefono)
    {
        //
        $this->nombres = $nombres;
        $this->total_venta = $total_venta;
        $this->telefono = $telefono;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.usuario');
    }
}
