@extends('layouts.home')

@section('title', 'Accueil')

@section('content')
<h2 class="text-center my-4">Nos événements</h2>
      <div class="row">
          @foreach($evenements as $evenement)
          <div class="col-md-4 mb-4">
         <a href="{{route('evenements.show',$evenement->id)}}">
          <div class="card event-card h-100">
            {{-- <a href="{{ route('evenement.details', $evenement->id) }}"> --}}
              <img src="{{ asset('storage/photos/' . $evenement->photo) }}" class="card-img-top event-card-img-top" alt="{{ $evenement->libelle }}">
            </a>
            <div class="card-body">
              <div class="date-badge">
                <span class="date-day">{{ \Carbon\Carbon::parse($evenement->date_evenement)->format('d') }}</span>
                <span class="date-month">{{ \Carbon\Carbon::parse($evenement->date_evenement)->format('M') }}</span>
              </div>
              <h5 class="card-titlevent">{{ $evenement->libelle }}</h5>
              <p class="card-textevent"><small class="text-muted">Veuillez réserver votre place avant la clôture des places</small></p>
            </div>
          </div>
         </a>
          </div>
          @endforeach
      </div>
      <style>
        body {
        font-family: 'Lato', sans-serif;
    }
    
    </style>
      @endsection
