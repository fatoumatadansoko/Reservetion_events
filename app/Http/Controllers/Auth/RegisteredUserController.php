<?php
// app/Http/Controllers/Auth/RegisteredUserController.php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Association;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     */
    public function store(RegistrationRequest $request)
    {
       // Store the uploaded photo
       $photoPath = $request->file('photo')->store('photos', 'public');

       // Create a new User record
       $user = User::create([
           'nom' => $request->nom,
           'telephone' => $request->telephone,
           'photo' => $photoPath, // Save the path to the stored photo
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);

       // Determine if it's a user or association registration
       if ($request->filled('prenom') && $request->filled('adresse_utilisateur')) {
           // User registration
           $user->utilisateur()->create([
               'prenom' => $request->prenom,
               'adresse' => $request->adresse_utilisateur,
           ]);
       } elseif ($request->filled('adresse_association') && $request->filled('description')) {
           // Association registration
           $user->association()->create([
               'adresse' => $request->adresse_association,
               'description' => $request->description,
               'ninea' => $request->ninea,
               'secteur_activite' => $request->secteur_activite,
               'date_creation' => $request->date_creation,
           ]);
       }

       return redirect()->route('login');
    }
}
