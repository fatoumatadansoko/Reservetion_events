<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
            <!-- resources/views/users/index.blade.php -->

@extends('layouts.sidebarAdmin')

@section('content')
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
 <!-- Afficher les informations de l'événement -->
<h1 class="text-center m-2">liste de l'evenement {{ $evenement->libelle}}</h1>


<!-- Afficher la liste des réservations -->
<h2>Liste des réservations</h2>
<ul>



</ul>
        <table class="table" style="font-size: 0.875rem; font-family: 'Open Sans';">
            <thead>
                <tr>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->prenom }}</td>

                        <td>{{ $user->user->nom }}</td>
                        <td>{{ $user->user->email }}</td>
                        <td>{{ $user->user->telephone }}</td>
                        <td>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editUserModal{{ $user->id }}">
                                Éditer
                            </button>

                            <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Édition de
                                                l'utilisateur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulaire d'édition de l'utilisateur -->
                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="prenom{{ $user->id }}" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control"
                                                        id="prenom{{ $user->id }}" name="prenom"
                                                        value="{{ $user->prenom }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nom{{ $user->id }}" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" id="nom{{ $user->id }}"
                                                        name="nom" value="{{ $user->user->nom }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email{{ $user->id }}" class="form-label">Email</label>
                                                    <input type="email" class="form-control"
                                                        id="email{{ $user->id }}" name="email"
                                                        value="{{ $user->user->email }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="telephone{{ $user->id }}"
                                                        class="form-label">Téléphone</label>
                                                    <input type="text" class="form-control"
                                                        id="telephone{{ $user->id }}" name="telephone"
                                                        value="{{ $user->user->telephone }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="permissions{{ $user->id }}"
                                                        class="form-label">Permissions</label>
                                                    <select multiple class="form-control"
                                                        id="permissions{{ $user->id }}" name="permissions[]">
                                                        @foreach ($permissions as $permission)
                                                            <option value="{{ $permission->name }}"
                                                                {{ $user->hasPermissionTo($permission->name) ? 'selected' : '' }}>
                                                                {{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection




{{-- <table class="table" style="font-size:0.875rem ; font-family: 'opens sans' ;">


<!-- Afficher la liste des réservations -->
<h2>Liste des réservations</h2>
<ul>



</ul>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>


  <table class="table" style="font-size:0.875rem ; font-family: 'opens sans' ;">

    <thead>



    </thead>
    <tbody>
      <tr>
        <td>Amadou</td>
        <td>Barro</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; ">barro@gmail.com</p></td>
        <td>70 000 00 00</td>
        <td><i class="fa-solid fa-ellipsis"></i></td>
      </tr>
      <tr>
        <td>Amadou</td>
        <td>Barro</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; ">barro2024@gmail.com</p></td>
        <td>70 000 00 00</td>
        <td><i class="fa-solid fa-ellipsis"></i></td>
      </tr>

    </tbody>
  </table> --}}


    </tbody>
  </table>


  <style>


<style>
    hr {
        height: 0.1rem;
        width: 100%;
        border: 0.3rem solid #000;
        /* Dark and thick border */
        border-collapse: collapse;
        /* Ensure that borders are not doubled */
        background: #000;
    }
</style>


</html>
