<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link rel="stylesheet" href="{{asset('detail_event.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="font-family: 'lato'">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="baniere">
    <div class="baniere_element  ">
        <div> <img class="logoASS" src="{{ asset('storage/photos/' . $evenement->photo) }}" alt="{{ $evenement->libelle }}"></div>
        <div class="ligne"> </div>
        <div> <h1 class="titre_baniere">Evenement:
            <br>
            {{ $evenement->libelle }}</h1>
       <h5 class="nom_association"> {{ $evenement->association->nom }}</h5>
       </div>
    </div>
</div>
<!-- image de décoration -->
<img src="{{asset('')}}" alt="">
<!-- Fin image de décoration -->
<div class="All-info"   >
@if ($evenement && $evenement->reservations()->where('statut', '')->exists())
<form action="{{ route('reserver') }}" method="POST">
    @csrf
    <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
    <input type="hidden" name="utilisateur_id" value="{{ auth()->user()->utilisateur->id}}">
    <button type="submit" class="btn_reserve">Réserver</button>
</form>
@endif

@if ($evenement && $evenement->reservations()->where('statut', 'acceptée')->exists())
    <p class="resultat_validation" style="color:#0D4C9B">
        Réservation :<br>
        Confirmée:
        <i class="fa-solid fa-circle-check" style="color:#0D4C9B"></i>
        <i class="fa-solid fa-badge-check" style="background-color: #0D4C9B"></i>
    </p>
@else
    <p class="resultat_validation" style="color:#0D4C9B">
        Réservation :<br>
        Annulée:
        <i class="fa-solid fa-circle-xmark" style="color: #b20a0a;"></i>
    </p>
@endif



    <h1  class="info_titre " >Informations principales:</h1>

    <section class="block_info" >
    <h1 class="info_titre">  </h1>
    <div class="box-info d-flex ">
        <img  src="{{asset('img/Place Marker.png')}}" alt=""> <p><strong>Lieu:</strong> {{ $evenement->lieu }}</p>
    </div>
    <div class="box-info d-flex ">
        <img  src="{{asset('img/Calendar.png')}}" alt=""> <p><strong>Date de l'événement:</strong> {{ $evenement->date_evenement }}</p>
    </div>
    <div class="box-info d-flex ">
        <img  src="{{asset('img/Important Time.png')}}" alt=""> <p><strong>Date limite d'inscription:</strong> {{ $evenement->date_limite_inscription }} </p>
    </div>
    <div class="box-info d-flex ">
        <img  src="{{asset('img/Standing Man.png')}}" alt=""> <p><strong>Nombre de place limité:</strong> {{ $evenement->nombre_place }} </p>
    </div>
    </section>

<div class="desc">
    <h1  class="info_titre">Descriptions:</h1>
    <p class="text-desc">
        {{ $evenement->description }}
    </p>
</div>
</div>
</body>
</html>



