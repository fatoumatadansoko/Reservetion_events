<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UtilisateurController extends Controller
{
    public function indexUser(){
        return view('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Utilisateur::all(); // Récupère tous les utilisateurs
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->back()->with('success', 'Événement supprimé avec succès.');
    }
}
