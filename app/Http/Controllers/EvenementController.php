<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Association;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvenementRequest;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements'));
    }

    public function create()
    {
        $associations = Association::all();
        return view('evenements.create', compact('associations'));
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
    
        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès.');
    }
    


    public function show(Evenement $evenement)
    {
        //
    }

    public function edit(Evenement $evenement)
    {
        //
    }

    public function update(Request $request, Evenement $evenement)
    {
        //
    }

    public function destroy(Evenement $evenement)
    {
        //
    }
}
