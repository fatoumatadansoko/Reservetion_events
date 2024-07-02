<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEvenementRequest;

class EvenementController extends Controller
{
    public function index()
    {
        $associations = Association::all();
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements','associations'));
    }

    public function create()
    {
        $associations = Association::all();
        return view('evenements.index', compact('associations'));
    }

    public function store(StoreEvenementRequest $request)
    {
        $photo = null;

        // Vérifier si un fichier photo est uploadé
        if ($request->hasFile('photo')) {
            // Stocker la photo dans le répertoire 'public/photos'
            $chemin_photo = $request->file('photo')->store('public/photos');

            // Vérifier si le chemin de la photo est bien généré
            if (!$chemin_photo) {
                return redirect()->back()->with('error', 'Erreur lors du téléchargement de la photo.');
            }

            // Récupérer le nom du fichier de la photo
            $photo = basename($chemin_photo);
        }

        // Préparer les données pour l'enregistrement
        $data = $request->all();
        $data['photo'] = $photo;

        // Enregistrer l'événement dans la base de données
        Evenement::create($data);

        return redirect()->back();
    }



    public function show(Evenement $evenement)
    {
        $evenement->load('association');
        return view('evenements.show', compact('evenement'));
    }


    public function edit(Evenement $evenement)
{
    $associations = Association::all();
    return view('evenements.edit', compact('evenement', 'associations'));
}


public function update(StoreEvenementRequest $request, Evenement $evenement)
{
    $data = $request->all();
    if ($request->hasFile('photo')) {
        // Supprimer l'ancienne photo
        if ($evenement->photo) {
            Storage::delete('public/photos/' . $evenement->photo);
        }

        // Stocker la nouvelle photo
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('photos', $filename, 'public');
        $data['photo'] = basename($path);
    }

    $evenement->update($data);

    return redirect()->route('associations.index')->with('success', 'Événement mis à jour avec succès.');
}


    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès.');
    }
    public function liste()
    {
        $evenements = Evenement::all();
        return view('evenements.liste', compact('evenements'));
    }
}
