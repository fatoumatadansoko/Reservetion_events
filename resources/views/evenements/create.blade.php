@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Nouvel Événement</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Formulaire -->
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="nombre_place">Nombre de Places</label>
            <input type="number" class="form-control" id="nombre_place" name="nombre_place" value="{{ old('nombre_place') }}" required>
        </div>
        <div class="form-group">
            <label for="lieu">Lieu</label>
            <input type="text" class="form-control" id="lieu" name="lieu" value="{{ old('lieu') }}" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" required>
        </div>
        <div class="form-group">
            <label for="association_id">Association</label>
            <select class="form-control" id="association_id" name="association_id" required>
                @foreach($associations as $association)
                    <option value="{{ $association->id }}" {{ old('association_id') == $association->id ? 'selected' : '' }}>{{ $association->adresse }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_evenement">Date de l'Événement</label>
            <input type="datetime-local" class="form-control" id="date_evenement" name="date_evenement" value="{{ old('date_evenement') }}" required>
        </div>
        <div class="form-group">
            <label for="date_limite_inscription">Date Limite d'Inscription</label>
            <input type="date" class="form-control" id="date_limite_inscription" name="date_limite_inscription" value="{{ old('date_limite_inscription') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
<style>
    body {
        font-family: 'Lato', sans-serif;
    }
</style>
@endsection
    