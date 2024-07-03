
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{asset('profil_user.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="baniere1">
    <div class="conteneur">
    <div class="photo">

    <img src="{{ asset('storage/' . $utilisateur->user->photo) }}" class="photoprofil" alt="Photo de profil">
    <form action="{{ route('user.updatePhoto') }}" method="post" style="display: flex; flex-direction:column; gap-1" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <input class="btn" type="file"  value="{{$utilisateur->user->photo}}" name="photo">
        <button type="submit" class="btn btn-light " style="color:#0D4C9B; margin: 1rem 0rem"> Modifier Profile</button>
    </form>
    </div>
   <div class="cont-form">

    <form action="{{route('utilisateur.update',$utilisateur)}}" method="POST" class=" d-flex flex-wrap">
        @csrf
        @method('PUT')
   <div class="box-form">
     <h5>Prenom</h5>
    <i class="fa-solid fa-address-card" style="color: #fff;"></i>
    <input class=" rounded-2" type="text" value=" {{$utilisateur->user->nom}}" name="nom" >
</div>
<div class="box-form">
    <h5>Nom</h5>
   <i class="fa-solid fa-address-card" style="color: #fff;"></i>
   <input class=" rounded-2" type="text" value="{{$utilisateur->prenom}}" name="prenom" >
</div>
   <div class="box-form">
    <h5>Adresse maison</h5>
    <i class="fa-solid fa-location-dot" style="color: #fff;"></i>
    <input class=" rounded-2" type="text" value="{{$utilisateur->adresse}}" name="adresse">
</div>
   <div class="box-form">
    <h5>Adresse email</h5>
    <i class="fa-solid fa-envelope" style="color: #fff;"></i>
    <input class=" rounded-2" type="text" value="{{$utilisateur->user->email}}" name="email">
</div>
   <div class="box-form">
    <h5>Téléphone</h5>
    <i class="fa-solid fa-phone" style="color: #fff;"></i>
    <input class=" rounded-2" type="text" value="{{$utilisateur->user->telephone}}" name="telephone">
</div>
<p class="d-flex"> Vous pouvez modifier directement en cas d’erreurs</p>
<button type="submit" class="btn ">Modifier</button>
    </form>
 </div>
 </div>
</div>
@endsection