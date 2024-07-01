<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

@extends('layouts.sidebarAssociation')
@section('content')


    <div class="container">
        <h1>Liste des Événements</h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Créer un Événement
        </button>

        <!-- Modal -->
        <div class="modal fade modal-lg ml-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
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
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-2">
                                <div class="form-group col-md">
                                    <label for="libelle">Libellé</label>
                                    <input type="text" class="form-control" id="libelle" name="libelle"
                                        value="{{ old('libelle') }}" required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="nombre_place">Nombre de Places</label>
                                    <input type="number" class="form-control" id="nombre_place" name="nombre_place"
                                        value="{{ old('nombre_place') }}" required>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="form-group col-md">
                                    <label for="date_limite_inscription">Date Limite d'Inscription</label>
                                    <input type="date" class="form-control" id="date_limite_inscription"
                                        name="date_limite_inscription" value="{{ old('date_limite_inscription') }}"
                                        required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="lieu">Lieu</label>
                                    <input type="text" class="form-control" id="lieu" name="lieu"
                                        value="{{ old('lieu') }}" required>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="form-group col-md">
                                    <label for="date_evenement">Date de l'Événement</label>
                                    <input type="datetime-local" class="form-control" id="date_evenement"
                                        name="date_evenement" value="{{ old('date_evenement') }}" required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            </div>
                            <input type="hidden" class="form-control" id="association_id" name="association_id" required
                                value="{{ $association->id }}">



                            {{-- <div class="form-group">
                                <label for="association_id">Association</label>
                                <select class="form-control" id="association_id" name="association_id" required>
                                    @foreach ($associations as $association)
                                        <option value="{{ $association->id }}"
                                            {{ old('association_id') == $association->id ? 'selected' : '' }}>
                                            {{ $association->adresse }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ferme</button>
                                <button type="submit" class="btn"
                                    style="background: #0D4C9B; color: white">Publier</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

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
                @foreach ($evenements as $evenement)
                    <tr>
                        <td>{{ $evenement->id }}</td>
                        <td>{{ $evenement->libelle }}</td>
                        <td>{{ $evenement->description }}</td>
                        <td>{{ $evenement->nombre_place }}</td>
                        <td>{{ $evenement->lieu }}</td>
                        <td><img src="{{ asset('storage/app/public/photos/' . $evenement->photo) }}"
                                alt="{{ $evenement->libelle }}" width="100"></td>
                        <td>{{ $evenement->date_evenement }}</td>
                        <td>{{ $evenement->date_limite_inscription }}</td>
                        <td>
                            <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning"><i
                                    class='bx bx-edit-alt'></i></a>
                            <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-warning"><i
                                    class="fa-regular fa-eye"></i></a>
                            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
