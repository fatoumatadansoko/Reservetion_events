<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $user;
    public $evenement;

    public function __construct($reservation, $user, $evenement)
    {
        $user = Auth::user();
        $this->reservation = $reservation;
        $this->evenement = $evenement;
        $this->user=$user;
       
    }

    public function build()
    {
        return $this->subject('Nouvelle Réservation')
                    ->view('emails.reservation');
    }
}
