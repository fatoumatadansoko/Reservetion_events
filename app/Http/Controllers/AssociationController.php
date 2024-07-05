<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssociationController extends Controller
{
    public function dashboardAssociation()
    {
        $associations = Association::all();

        return view('dashbordAssociation', compact('associations'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $association = $user->association;

        if (!$association) {
            abort(401);
        }

       // $evenements = Evenement::where('association_id', $association->id)->get();
        $evenements = Evenement::where('association_id', $association->id)->paginate(10);

        return view('associations.index', compact('evenements', 'association'));
    }
    public function liste_association()
    {
        $associations = Association::paginate(10);
        return view('admin.list_association', compact('associations'));
    }
    // Controller


    public function toggleAssociationStatus($id)
    {
        $association = Association::find($id);
        $association->is_active = !$association->is_active;
        $association->save();

        return redirect()->back()->with('success', 'Le statut de l\'association a été mis à jour.');
    }

    public function detail_event($id){
        $evenement = Evenement::findOrFail($id);

        return view ('associations.detail_event',compact('evenement'));
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
    public function show(Association $association)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}
