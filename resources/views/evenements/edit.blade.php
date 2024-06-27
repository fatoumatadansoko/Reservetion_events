@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Événement</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('evenements.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle', $evenement->libelle) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $evenement->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="nombre_place">Nombre de Places</label>
            <input type="number" class="form-control" id="nombre_place" name="nombre_place" value="{{ old('nombre_place', $evenement->nombre_place) }}" required>
        </div>
        <div class="form-group">
            <label for="lieu">Lieu</label>
            <input type="text" class="form-control" id="lieu" name="lieu" value="{{ old('lieu', $evenement->lieu) }}" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            <img src="{{ asset('storage/photos/' . $evenement->photo) }}" alt="{{ $evenement->libelle }}" width="100">
        </div>
        <div class="form-group">
            <label for="association_id">Association</label>
            <select class="form-control" id="association_id" name="association_id" required>
                @foreach($associations as $association)
                    <option value="{{ $association->id }}" {{ old('association_id', $evenement->association_id) == $association->id ? 'selected' : '' }}>{{ $association->adresse }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_evenement">Date de l'Événement</label>
            <input type="datetime-local" class="form-control" id="date_evenement" name="date_evenement" value="{{ old('date_evenement', $evenement->date_evenement) }}" required>
        </div>
        <div class="form-group">
            <label for="date_limite_inscription">Date Limite d'Inscription</label>
            <input type="date" class="form-control" id="date_limite_inscription" name="date_limite_inscription" value="{{ old('date_limite_inscription', $evenement->date_limite_inscription) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
    <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Retour</a>
</div>
{{-- @endsection --}}
