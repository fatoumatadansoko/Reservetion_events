<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class reservationStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $status;

    public function __construct(Reservation $reservation, $status)
    {
        $this->reservation = $reservation;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Notification de Statut de la reservation')
                    ->markdown('emails.reservation-status-notification');
    }
}

