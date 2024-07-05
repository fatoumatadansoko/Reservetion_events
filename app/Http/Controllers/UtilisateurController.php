<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePhotouserRequest;
use App\Http\Requests\UpdateProfilutilisateurRequest;
use Spatie\Permission\Models\Permission;

class UtilisateurController extends Controller
{
    public function indexUser()
    {
        return view('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = Utilisateur::paginate(1); // Récupère tous les utilisateurs
        $permissions = Permission::all(); // Récupère toutes les permissions
        return view('associations.liste_utilisateur', compact('users', 'permissions'));
    }

    public function editUser($id)
    {
        $user = Utilisateur::findOrFail($id);
        $permissions = Permission::all(); // Récupère toutes les permissions
        return view('users.edit', compact('user', 'permissions'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = Utilisateur::findOrFail($id);
        $user->update($request->only('prenom', 'nom', 'email', 'telephone'));

        // Met à jour les permissions de l'utilisateur
        $user->syncPermissions($request->permissions);

        // Rediriger avec un message de succès, si nécessaire
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
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
    public function show(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        // Récupérer l'utilisateur connecté
        $utilisateurConnecte = Auth::user()->id;

        // Vérifier si l'utilisateur connecté est celui dont on veut éditer le profil
        if ($utilisateurConnecte  == $utilisateur->id) {
            // Charger les relations de l'utilisateur en cours d'édition
            $utilisateur->load('user');
            return view('utilisateurs.profil_user', compact('utilisateur', 'utilisateurConnecte'));
        }


        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilutilisateurRequest $request, Utilisateur $utilisateur)
    {

        $utilisateur->update($request->validated());
        Auth::user()->update($request->validated());

        return redirect()->back()->with('message', 'modification du profil reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->back()->with('success', 'Événement supprimé avec succès.');
    }

    //modifier le photo de profil de l'utilisateur

    public function updatePhoto(UpdatePhotouserRequest  $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Gérer l'upload de la photo de profil
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }

            // Stocker la nouvelle photo
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->update(['photo' => $path]);
        }

        // Rediriger avec un message de succès
        return redirect()->back()->with('message', 'Photo de profil mise à jour avec succès');
    }
}
