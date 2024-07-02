<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        .tab-navigation a {
            cursor: pointer;
        }
        .tab-navigation .active {
            font-weight: bold;
        }
    </style>
</head>
<body>
<x-guest-layout>
    <!-- Tab navigation -->
    <ul class="nav nav-tabs mb-4 tab-navigation">
        <li class="nav-item">
            <a class="nav-link active text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900" id="user-tab">
                Utilisateur
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900" id="association-tab">
                Association
            </a>
        </li>
    </ul>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- User registration form -->
    <div id="user-form" class="mb-4">
        <h2 class="text-lg font-semibold mb-2">Inscription Utilisateur</h2>
        <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="role" value="user">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="prenom" :value="__('Prénom')" />
                    <x-text-input id="prenom" type="text" name="prenom" :value="old('prenom')" class="form-control" required />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="nom" :value="__('Nom')" />
                    <x-text-input id="nom" type="text" name="nom" :value="old('nom')" class="form-control" required autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="telephone" :value="__('Téléphone')" />
                    <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')" class="form-control" required />
                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="adresse_utilisateur" :value="__('Adresse')" />
                    <x-text-input id="adresse_utilisateur" type="text" name="adresse_utilisateur" :value="old('adresse_utilisateur')" class="form-control" required />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="photo" :value="__('Photo')" />
                    <x-text-input id="photo" type="file" name="photo" class="form-control" required />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" class="form-control" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" type="password" name="password" class="form-control" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-primary-button class="btn btn-primary" style="background: #0d4c9b;">{{ __('Inscrire') }}</x-primary-button>
            </div>
        </form>
    </div>

    <!-- Association registration form -->
    <div id="association-form" class="mb-4" style="display: none;">
        <h2 class="text-lg font-semibold mb-2">Inscription Association</h2>
        <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="role" value="association">

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="nom" :value="__('Nom')" />
                    <x-text-input id="nom" type="text" name="nom" :value="old('nom')" class="form-control" required autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="telephone" :value="__('Téléphone')" />
                    <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')" class="form-control" required />
                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="photo" :value="__('Photo')" />
                    <x-text-input id="photo" type="file" name="photo" class="form-control" required />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" class="form-control" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="secteur_activite" :value="__('Secteur d\'activité')" />
                    <x-text-input id="secteur_activite" type="text" name="secteur_activite" :value="old('secteur_activite')" class="form-control" required />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="date_creation" :value="__('Date de création')" />
                    <x-text-input id="date_creation" type="date" name="date_creation" :value="old('date_creation')" class="form-control" required />
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="adresse_association" :value="__('Adresse')" />
                    <x-text-input id="adresse_association" type="text" name="adresse_association" :value="old('adresse_association')" class="form-control" required />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="ninea" :value="__('NINEA')" />
                    <x-text-input id="ninea" type="text" name="ninea" :value="old('ninea')" class="form-control" required />
                </div>
            </div>

            <div class="mb-3">
                <x-input-label for="description" :value="__('Description')" />
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" type="password" name="password" class="form-control" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <x-primary-button class="btn btn-primary" style="background: #0d4c9b;">{{ __('Inscrire') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<script>
    // Script pour basculer entre les formulaires d'utilisateur et d'association
    document.addEventListener('DOMContentLoaded', function() {
        const userForm = document.getElementById('user-form');
        const associationForm = document.getElementById('association-form');
        const userTab = document.getElementById('user-tab');
        const associationTab = document.getElementById('association-tab');

        userTab.addEventListener('click', function(e) {
            e.preventDefault();
            userForm.style.display = 'block';
            associationForm.style.display = 'none';
            userTab.classList.add('active');
            associationTab.classList.remove('active');
        });

        associationTab.addEventListener('click', function(e) {
            e.preventDefault();
            userForm.style.display = 'none';
            associationForm.style.display = 'block';
            userTab.classList.remove('active');
            associationTab.classList.add('active');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
