<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Users;
use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Mail\ReservationMail;
use App\Mail\Reservationdecline;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reservation_approbation;
use Spatie\Permission\Models\Permission;


class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view evenement')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $user = Auth::user();
        $association = $user->association;
        // Récupérer les événements de l'association avec leurs réservations
        $evenements = Evenement::where('association_id', $association->id)
            ->with('reservations')
            ->get();

        return view('associations.reservations', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        $evenement = Evenement::findOrFail($id);
        return view('evenements.detail', compact('evenement'));
    }
    public function getReservations()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
    public function reserver(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour effectuer une réservation.');
        }


        $reservation = Reservation::create($request->all());
        $reservation->statut = 'acceptée';
        $reservation->save();

        $evenement = Evenement::find($reservation->evenement_id);
        $user = Auth::user();

        Mail::to($user->email)->send(new Reservation_approbation($reservation, $evenement, $user));

        return redirect()->back()->with('message', 'Réservation effectuée avec succès.');
    }

    public function reserverdécliné(Request $request)
    {
        $reservation = Reservation::create($request->all());
        $reservation = Reservation::find($reservation->id);
        $reservation->statut = 'décliné';
        $reservation->save();
        $evenement = Evenement::find($reservation->evenement_id);

        $user = Auth::user();
        Mail::to(Auth::user()->email)->send(new Reservation_approbation($reservation, $evenement, $user, Auth::user()));

        return redirect()->back()->with('message', 'Réservation effectuée avec succès.');
    }


    public function liste_person_reserve_events($evenement_id)
    {
        // Récupérer les réservations pour l'événement avec les utilisateurs associés
        $reservations = Reservation::where('evenement_id', $evenement_id)
            ->with('utilisateur')
            ->get();

        // Optionnel: Récupérer l'événement pour afficher des informations supplémentaires
        $evenement = Evenement::find($evenement_id);
        return view('associations.liste_reservation', compact('reservations', 'evenement'));
    }

    public function reserverdecline(Request $request)
    {

        $reservation = Reservation::find($request->id);
        $reservation->update(['statut' => 'declinée']);
        $nom = $request->nom;
        $libelle_evenement = $request->libelle_evenement;
        $prenom = $request->prenom;
        $email = $request->email;
        $evenement = Evenement::find($reservation->evenement_id);

        Mail::to($email)->send(new Reservationdecline($reservation, $evenement, $nom, $email, $libelle_evenement, $prenom));

        return redirect()->back()->with('message', 'Réservation effectuée avec succès.');
    }
}
