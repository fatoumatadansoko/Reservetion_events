<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('liste.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
@extends('layouts.sidebarAssociation')
@section('content')

<div class="container">
    <h1>Liste des Événements</h1>

    <button type="button" class="btn" style="background: #0d4c9b; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Créer un Événement
    </button>

    <!-- Modal pour créer un nouvel événement -->
    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer un Nouvel Événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libelle">Libellé</label>
                                    <input type="text" class="form-control" id="libelle" name="libelle"
                                           value="{{ old('libelle') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_place">Nombre de Places</label>
                                    <input type="number" class="form-control" id="nombre_place" name="nombre_place"
                                           value="{{ old('nombre_place') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_limite_inscription">Date Limite d'Inscription</label>
                                    <input type="date" class="form-control" id="date_limite_inscription"
                                           name="date_limite_inscription" value="{{ old('date_limite_inscription') }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lieu">Lieu</label>
                                    <input type="text" class="form-control" id="lieu" name="lieu"
                                           value="{{ old('lieu') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_evenement">Date de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="date_evenement"
                                           name="date_evenement" value="{{ old('date_evenement') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        <input type="hidden" class="form-control" id="association_id" name="association_id" required
                               value="{{ $association->id }}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn" style="background: #0D4C9B; color: white">Publier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau responsive -->
    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Date de l'événement</th>
                    <th>Nombre de places</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evenements as $evenement)
                <tr>
                    <td>{{ $evenement->libelle }}</td>
                    <td>
                        <p class="border border-dark rounded-pill py-1 px-2 d-inline-block">
                            {{ $evenement->date_evenement }}
                        </p>
                    </td>
                    <td>{{ $evenement->nombre_place }}</td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal1" href="{{ route('evenements.edit', $evenement->id) }}" class="btn "  style="background-color: #0D4C9B"><i class='bx bx-edit-alt' style="color: #fff"></i></a>
                        <a href="{{ route('evenements.show', $evenement->id) }}" class="btn " style="background-color: #0D4C9B"><i class="fa-regular fa-eye"  style="color: #fff"></i></a>
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                        </form>
                        <a href="reservation_person/{{$evenement->id}}/reservations" class="btn " style="background-color: #0D4C9B"><i class="fa-solid fa-users-gear"  style="color: #fff"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal pour modifier un événement -->
    <div class="modal fade modal-lg" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'Événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('evenements.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libelle">Libellé</label>
                                    <input type="text" class="form-control" id="libelle" name="libelle"
                                           value="{{ old('libelle', $evenement->libelle) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_place">Nombre de Places</label>
                                    <input type="number" class="form-control" id="nombre_place" name="nombre_place"
                                           value="{{ old('nombre_place', $evenement->nombre_place) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_limite_inscription">Date Limite d'Inscription</label>
                                    <input type="date" class="form-control" id="date_limite_inscription"
                                           name="date_limite_inscription" value="{{ old('date_limite_inscription', $evenement->date_limite_inscription) }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lieu">Lieu</label>
                                    <input type="text" class="form-control" id="lieu" name="lieu"
                                           value="{{ old('lieu', $evenement->lieu) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_evenement">Date de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="date_evenement"
                                           name="date_evenement" value="{{ old('date_evenement', $evenement->date_evenement) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $evenement->description) }}</textarea>
                        </div>
                        <input type="hidden" class="form-control" id="association_id" name="association_id" required
                               value="{{ $association->id }}">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn" style="background: #0D4C9B; color: white">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
