<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
    public function show(Reservation $reservation)
    {
        //
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

        $reservation = Reservation::create($request->all());
        $reservation = Reservation::findOrFail($reservation->id);
        $reservation->statut = 'acceptée';
        $reservation->save();
        Mail::to(Auth::user()->email)->send(new ReservationMail($reservation, $reservation->statut));


    return back()->with('message', 'Réservation effectuée avec succès.');
}
}




