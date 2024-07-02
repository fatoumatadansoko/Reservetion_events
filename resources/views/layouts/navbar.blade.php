<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
  <a class="navbar-brand" href="#">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150px" class="imagenav">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link active" href="{{route('accueil')}}">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('accueil')}}#a-propos">À propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('liste')}}">Événements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('accueil')}}#contact">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item">
        <a href="{{ route('register') }}" id="seConnecterButton" class="btn btn-connect">Se connecter</a>
      </li>
      @endguest
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('storage/photos/' . Auth::user()->photo) }}" class="rounded-circle" alt="Photo de profil" width="40" height="40">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('utilisateur.edit',$utilisateur = Auth::user()->id)}}"> profil</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Déconnexion
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
      @endauth
    </ul>
  </div>
</nav>
