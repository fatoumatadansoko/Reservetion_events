<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{ asset('detail_event.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        .icon-style {
            color: #0D4C9B;
            margin-right: 1rem;
        }

        .box-info {
            align-items: center;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @extends('layouts.home')
    @section('content')
        <div class="baniere">
            <div class="baniere_element">
                <div><img class="logoASS" src="{{ asset('storage/photos/' . $evenement->photo) }}"
                        alt="{{ $evenement->libelle }}"></div>
                <div class="ligne"></div>
                <div>
                    <h1 class="titre_baniere">Événement:<br>{{ $evenement->libelle }}</h1>
                    <h6 class="nom_association">{{ $evenement->association->user->nom }}</h6>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="All-info">
            @if (auth()->check() && $evenement && $evenement->reservations()->where('utilisateur_id', auth()->user()->utilisateur->id )->where('statut', 'acceptée')->exists())
            <p class="resultat_validation" style="color:#0D4C9B">
                Réservation :<br>
                Confirmée:
                <i class="fa-solid fa-circle-check" style="color:#0D4C9B"></i>
                <i class="fa-solid fa-badge-check" style="background-color: #0D4C9B"></i>
            </p>
            @elseif (auth()->check() && $evenement && $evenement->reservations()->where('utilisateur_id', auth()->user()->utilisateur->id )->where('statut', 'déclinée')->exists())
            <p class="resultat_validation" style="color:#0D4C9B">
                Réservation :<br>
                Annulée:
                <i class="fa-solid fa-circle-xmark" style="color: #b20a0a;"></i>
            @else
            <form id="reservation-form" action="{{ route('reserver') }}" method="POST">
                @csrf
                <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
                @if(auth()->check())
                <input type="hidden" name="utilisateur_id" value="{{ auth()->user()->utilisateur->id }}">
                @endif
                <button type="submit" class="btn_reserve">Réserver</button>
            </form>
            @endif



            <script>
                document.getElementById('reservation-form').addEventListener('submit', function(event) {
                    @if (!auth()->check())
                    event.preventDefault();
                    window.location.href = "{{ route('login') }}";
                    @endif
                });
            </script>

            <h1 class="info_titre">Informations principales:</h1>

            <section class="block_info">
                <div class="box-info d-flex">
                    <i class="fa-solid fa-map-marker-alt icon-style"></i>
                    <p><strong>Lieu:</strong> {{ $evenement->lieu }}</p>
                </div>
                <div class="box-info d-flex">
                    <i class="fa-solid fa-calendar icon-style"></i>
                    <p><strong>Date de l'événement:</strong> {{ $evenement->date_evenement }}</p>
                </div>
                <div class="box-info d-flex">
                    <i class="fa-solid fa-clock icon-style"></i>
                    <p><strong>Date limite d'inscription:</strong> {{ $evenement->date_limite_inscription }}</p>
                </div>
                <div class="box-info d-flex">
                    <i class="fa-solid fa-user-friends icon-style"></i>
                    <p><strong>Nombre de places disponibles:</strong> {{ $placesDisponibles }}</p>
                </div>
            </section>

            <div class="desc">
                <h1 class="info_titre">Descriptions:</h1>
                <p class="text-desc">{{ $evenement->description }}</p>
            </div>
        </div>
    @endsection
</body>

</html>
