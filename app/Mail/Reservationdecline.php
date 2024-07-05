<?php

namespace App\Mail;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Reservationdecline extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $reservation;
    public $evenement;
    public $nom;
    public $email;
    public $prenom;
    public $libelle_evenement;


    public function __construct(Reservation $reservation, Evenement $evenement, $nom, $email,$prenom,$libelle_evenement)
    {
        $this->reservation = $reservation;
        $this->evenement = $evenement;
        $this->nom = $nom;
        $this->email = $email;
        $this->prenom = $prenom;
        $this->libelle_evenement = $libelle_evenement ;
    }

    public function build()
    {
        return $this->view('emails.decline')
                    ->subject('Déclinaison de votre réservation');
    }

}
