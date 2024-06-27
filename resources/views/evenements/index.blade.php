@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Événements</h1>
    <a href="{{ route('evenements.create') }}" class="btn btn-primary">Créer un Événement</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Nombre de Places</th>
                <th>Lieu</th>
                <th>Photo</th>
                <th>Date de l'Événement</th>
                <th>Date Limite d'Inscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenements as $evenement)
            <tr>
                <td>{{ $evenement->id }}</td>
                <td>{{ $evenement->libelle }}</td>
                <td>{{ $evenement->description }}</td>
                <td>{{ $evenement->nombre_place }}</td>
                <td>{{ $evenement->lieu }}</td>
                <td><img src="{{ asset('storage/photos/' . $evenement->photo) }}" alt="{{ $evenement->libelle }}" width="100"></td>
                <td>{{ $evenement->date_evenement }}</td>
                <td>{{ $evenement->date_limite_inscription }}</td>
                <td>
                    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning">Éditer</a>
                    <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-warning">Voir</a>
                    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- @endsection --}}
