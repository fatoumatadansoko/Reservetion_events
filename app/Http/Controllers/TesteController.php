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
}
