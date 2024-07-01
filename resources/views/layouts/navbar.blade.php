<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150px" class="imagenav">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#a-propos">A propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Evenements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
      <a href="{{ route('register') }}" id="seConnecterButton" class="btn btn-connect">Se connecter</a>
    </div>
  </nav>
  