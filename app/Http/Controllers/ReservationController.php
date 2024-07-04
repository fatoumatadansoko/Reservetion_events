<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Utilisateur;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Mail\ReservationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reservation_approbation;


class ReservationController extends Controller
{
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

        $validated = $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        $reservation = Reservation::create($validated);
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
}
