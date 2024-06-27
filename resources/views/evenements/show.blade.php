@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $evenement->libelle }}</h1>
    <div class="mb-4">
        <img src="{{ asset('storage/photos/' . $evenement->photo) }}" alt="{{ $evenement->libelle }}" width="300">
    </div>
    <p><strong>Description:</strong> {{ $evenement->description }}</p>
    <p><strong>Nombre de Places:</strong> {{ $evenement->nombre_place }}</p>
    <p><strong>Lieu:</strong> {{ $evenement->lieu }}</p>
    <p><strong>Date de l'Événement:</strong> {{ $evenement->date_evenement }}</p>
    <p><strong>Date Limite d'Inscription:</strong> {{ $evenement->date_limite_inscription }}</p>
    <p><strong>Association:</strong> {{ $evenement->association->adresse }}</p>
    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning">Éditer</a>
    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Retour</a>
</div>
{{-- @endsection --}}