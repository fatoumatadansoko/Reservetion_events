<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Association;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
        
            'telephone' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'required|image|max:2048',
            'role' => 'required|string|in:user,association',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

        $user = User::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'photo' => $photoPath,
            'password' => Hash::make($request->password),
        ]);



        if ($request->role === 'user') {
            Utilisateur::create([
                'user_id' => $user->id,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse_utilisateur,
            ]);
        } elseif ($request->role === 'association') {
            Association::create([
                'user_id' => $user->id,
                'adresse' => $request->adresse_association,
                'description' => $request->description,
                'ninea' => $request->ninea,
                'secteur_activite' => $request->secteur_activite,
                'date_creation' => $request->date_creation,
            ]);
        }

        $user->assignRole($request->role);

        event(new Registered($user));

        // auth()->login($user);

        return redirect('login');
    }
}
