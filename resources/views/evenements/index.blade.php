@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<div class="container">
    <div class="card-banner">
        <div class="d-flex" style="width: 63%;">
          <img src="{{ asset('img/banner.png') }}" alt="Logo" class="imagebanner">
        </div>
        <div class="d-flex align-items-center" style="width: 30%; padding-left: 10px;">
          <div class="card-body">
            <div class="section-title">Trois événements à venir</div>
            <div class="text-as-button">
              <h5 class="card-title"><i class="fas fa-calendar-alt icon-calendar"></i>Soirée diar diar</h5 >
              <p class="card-text"><small class="text-body-secondary">mardi le 30 mai 2024</small></p>
            </div>
            <div class="text-as-button">
                <h5 class="card-title"><i class="fas fa-calendar-alt icon-calendar"></i>Soirée diar diar</h5 >
                <p class="card-text"><small class="text-body-secondary">mardi le 30 mai 2024</small></p>
              </div><div class="text-as-button">
                <h5 class="card-title"><i class="fas fa-calendar-alt icon-calendar"></i>Soirée diar diar</h5 >
                <p class="card-text"><small class="text-body-secondary">mardi le 30 mai 2024</small></p>
              </div>
          </div>
        </div>
      </div>
      <!-- Section A propos -->
    <div class="justify-content-center section-bleu section text-center">
        <div class="container py-5">
          <h3 class="pb-2" id="a-propos">A propos de nous</h3>
          <p class="paragraphe">
            Notre application de réservation d'événements est la solution idéale pour organiser, découvrir et participer à des événements de manière simple et efficace. Pour les organisateurs, elle offre des outils puissants pour créer, promouvoir et gérer des événements avec une interface intuitive et des options de promotion avancées. Pour les participants, elle facilite la découverte d'événements grâce à des recommandations personnalisées et une réservation en quelques clics avec des paiements sécurisés. Profitez d'une expérience utilisateur fluide et sécurisée, adaptée à tous les appareils, et transformez votre façon de vivre les événements.          </p>
          <div class="d-flex justify-content-center">
            <button class="btn btn-danger">Découvrir</button>
          </div>
        </div>
      </div>
      
      <!-- Nos chiffres -->
      <div class="text-center py-5 chiffres section">
        <div class="nos-chiffres">
          <div class="container">
            <h3>Nos chiffres</h3>
            <div class="row justify-content-around">
              <div class="col-md-3">
                <h4>100</h4>
                <p>Nos partenaires</p>
              </div>
              <div class="col-md-3">
                <h4>200</h4>
                <p>Nos évènements</p>
              </div>
              <div class="col-md-3">
                <h4>300</h4>
                <p>Nos utilisateurs</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h2 class="text-center my-4">Nos événements</h2>
      <div class="row">
          @foreach($evenements as $evenement)
          <div class="col-md-4 mb-4">
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
          </div>
          @endforeach
      </div>
      <div class="d-flex justify-content-center">
          <button class="btn btn-primary">Voir plus</button>
      </div>
      {{-- <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="true">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/simplon.webp') }}" alt="Logo">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/simplon.webp') }}" alt="Logo">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/simplon.webp') }}" alt="Logo">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div> --}}
      
      
      <div id="carouselExample" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    {{-- <h1>Liste des Événements</h1>
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
    </table> --}}
</div>
<div class="py-5 formulaire">
    <h3 class="text-center" id="contact">Contactez-nous</h3>
    <form method="POST" action="">
      @csrf
      <div class="contact">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text" class="form-control" id="inputNom" name="nom" placeholder="Nom" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text" class="form-control" id="inputPrenom" name="prenom" placeholder="Prenom" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail">Adresse email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="exemple@gmail.com" required>
        </div>
        <div class="form-group">
          <label for="inputPhone">Numero de telephone</label>
          <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="77 000 00 00" required>
        </div>
        <div class="form-group">
          <label for="inputMessage">Message</label>
          <textarea class="form-control" id="inputMessage" name="message" rows="3" placeholder="Contenu de votre message..." required></textarea>
        </div>
        <button type="submit" class="btn btn-custom">Envoyer</button>
      </div>
    </form>
  </div>
</div>
@endsection
