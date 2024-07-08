<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        .tab-navigation a {
            cursor: pointer;
        }

        .tab-navigation .active {
            font-weight: bold;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background: #0d4c9b;
            border: none;
        }

        .btn-primary:hover {
            background: #0a3d73;
        }
    </style>
</head>

<body>
    <x-guest-layout>
        <!-- Tab navigation -->
        <ul class="nav nav-tabs mb-4 tab-navigation">
            <li class="nav-item">
                <a class="nav-link active text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900"
                    id="user-tab">
                    Utilisateur
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900"
                    id="association-tab">
                    Association
                </a>
            </li>
        </ul>

        <!-- User registration form -->
        <div id="user-form" class="mb-4 form-container">
            <h2 class="text-lg font-semibold mb-2">Inscription Utilisateur</h2>
            <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role" value="user">
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="prenom" :value="__('Prénom')" />
                        <x-text-input id="prenom" type="text" name="prenom" :value="old('prenom')" class="form-control"
                            required />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="nom" :value="__('Nom')" />
                        <x-text-input id="nom" type="text" name="nom" :value="old('nom')" class="form-control" required
                            autofocus />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="telephone" :value="__('Téléphone')" />
                        <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')"
                            class="form-control" required />
                        <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="adresse_utilisateur" :value="__('Adresse')" />
                        <x-text-input id="adresse_utilisateur" type="text" name="adresse_utilisateur"
                            :value="old('adresse_utilisateur')" class="form-control" required />
                        <x-input-error :messages="$errors->get('adresse_utilisateur')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="photo" :value="__('Photo')" />
                        <x-text-input id="photo" type="file" name="photo" class="form-control" required />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" class="form-control"
                            required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="password" :value="__('Mot de passe')" />
                        <x-text-input id="password" type="password" name="password" class="form-control" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-primary-button class="btn btn-primary">{{ __('Inscrire') }}</x-primary-button>
                </div>
            </form>
        </div>

        <!-- Association registration form -->
        <div id="association-form" class="mb-4 form-container" style="display: none;">
            <h2 class="text-lg font-semibold mb-2">Inscription Association</h2>
            <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role" value="association">

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="nom" :value="__('Nom')" />
                        <x-text-input id="nom" type="text" name="nom" :value="old('nom')" class="form-control" required
                            autofocus />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="telephone" :value="__('Téléphone')" />
                        <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')"
                            class="form-control" required />
                        <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="photo" :value="__('Photo')" />
                        <x-text-input id="photo" type="file" name="photo" class="form-control" required />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" class="form-control"
                            required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="secteur_activite" :value="__('Secteur d\'activité')" />
                        <x-text-input id="secteur_activite" type="text" name="secteur_activite"
                            :value="old('secteur_activite')" class="form-control" required />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="date_creation" :value="__('Date de création')" />
                        <x-text-input id="date_creation" type="date" name="date_creation"
                            :value="old('date_creation')" class="form-control" required />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="adresse_association" :value="__('Adresse')" />
                        <x-text-input id="adresse_association" type="text" name="adresse_association"
                            :value="old('adresse_association')" class="form-control" required />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="page_web" :value="__('Page Web')" />
                        <x-text-input id="page_web" type="url" name="page_web" :value="old('page_web')"
                            class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="password" :value="__('Mot de passe')" />
                        <x-text-input id="password" type="password" name="password" class="form-control" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-primary-button class="btn btn-primary">{{ __('Inscrire') }}</x-primary-button>
                </div>
            </form>
        </div>

        <!-- JavaScript for switching tabs -->
        <script>
            document.getElementById('user-tab').addEventListener('click', function () {
                document.getElementById('user-form').style.display = 'block';
                document.getElementById('association-form').style.display = 'none';
                this.classList.add('active');
                document.getElementById('association-tab').classList.remove('active');
            });

            document.getElementById('association-tab').addEventListener('click', function () {
                document.getElementById('user-form').style.display = 'none';
                document.getElementById('association-form').style.display = 'block';
                this.classList.add('active');
                document.getElementById('user-tab').classList.remove('active');
            });
        </script>
    </x-guest-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12bbn2J6IVPbHVq2EwGZwBQvSOeC0tCqbb/zOt0XK7AKWkUR" crossorigin="anonymous"></script>
</body>

</html>
