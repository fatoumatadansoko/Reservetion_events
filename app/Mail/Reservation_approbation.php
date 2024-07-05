<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Reservation_approbation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $reservation;
    public $user;
    public $evenement;

    public function __construct(Reservation $reservation,Evenement $evenement,$user)
    {
        $user = Auth::user();
        $this->reservation = $reservation;
        $this->evenement = $evenement;
        $this->user=$user;

    }

            public function build()
            {
                return $this->subject('Nouvelle Réservation')
                            ->view('emails.reservation')
                            ->with([
                                'reservation' => $this->reservation,
                                'evenement' => $this->evenement,
                            ]);
            }
}
