<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //
    public function liste(){
        return view('associations/liste_event');
    }
    public function liste_reserve (){
        return view ('utilisateurs/liste_reservation');
    }
    public function liste_association(){
        return view('admin.list_association');
    }
    public function liste_user(){
        return view('associations.liste_utilisateur');
    }
    public function detail_events(){
        return view('evenements.detail');
    }
    public function profil_user(){
        return view('utilisateurs.profil_user');
    }
}
