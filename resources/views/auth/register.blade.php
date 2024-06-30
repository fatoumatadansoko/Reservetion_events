<x-guest-layout>
    <!-- Tab navigation -->
    <ul class="d-flex mb-4 align-items-center">
        <li>
            <a href="#user-form"
               class="text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900">
                Utilisateur
            </a>
        </li>
        <li>
            <a href="#association-form"
               class="text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900">
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
                <div class="col-6">
                    <x-input-label for="prenom" :value="__('Prénom')" />
                    <x-text-input id="prenom" type="text" name="prenom" :value="old('prenom')" style="width: 100%" required />
                </div>
                <div class="col-6">
                    <x-input-label for="nom" :value="__('Nom')" />
                    <x-text-input id="nom" type="text" name="nom" :value="old('nom')" style="width: 100%" required autofocus />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <x-input-label for="telephone" :value="__('Téléphone')" />
                    <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')" style="width: 100%" required />
                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                </div>
                <div class="col-6">
                    <x-input-label for="adresse_utilisateur" :value="__('Adresse')" />
                    <x-text-input id="adresse_utilisateur" type="text" name="adresse_utilisateur" style="width: 100%" :value="old('adresse_utilisateur')" required />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-input-label for="photo" :value="__('Photo')" />
                    <x-text-input id="photo" type="file" name="photo" style="width: 100%" required />
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>
                <div class="col-6">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" style="width: 100%" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" type="password" name="password" style="width: 100%" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="col-6">
                    <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" style="width: 100%" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button style="background: #0d4c9b;">{{ __('Inscrire') }}</x-primary-button>
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
            <div class="col-6">
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input id="nom" type="text" name="nom" :value="old('nom')" style="width: 100%"  required autofocus />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>
            <div class="col-6">
                <x-input-label for="telephone" :value="__('Téléphone')" />
                <x-text-input id="telephone" type="text" name="telephone" style="width: 100%"  :value="old('telephone')" required />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-6">
                <x-input-label for="photo" :value="__('Photo')" />
                <x-text-input id="photo" type="file" name="photo" style="width: 100%"  required />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
            <div class="col-6">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" style="width: 100%"  :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
          </div>
          <div class="row">
            <div class="col-6">
                <x-input-label for="secteur_activite" :value="__('Secteur d\'activité')" />
                <x-text-input id="secteur_activite" type="text" style="width: 100%"  name="secteur_activite" :value="old('secteur_activite')" required />
            </div>
            <div class="col-6">
                <x-input-label for="date_creation" :value="__('Date de création')" />
                <x-text-input id="date_creation" type="date"  style="width: 100%" name="date_creation" :value="old('date_creation')" required />
            </div>
          </div>
            <!-- Association-specific fields -->
           <div class="row">
            <div class="col-6">
                <x-input-label for="adresse_association" :value="__('Adresse')" />
                <x-text-input id="adresse_association" type="text" style="width: 100%"  name="adresse_association" :value="old('adresse_association')" required />
            </div>
            <div class="col-6">
                <x-input-label for="ninea" :value="__('NINEA')" />
                <x-text-input id="ninea" type="text" name="ninea" style="width: 100%"  :value="old('ninea')" required />
            </div>
           </div>
            <div class="">
                <x-input-label for="description" :value="__('Description')" />
                {{-- <x-text-texterra id="description" type="text" name="description" style="width: 100%"  :value="old('description')" required /> --}}
                <textarea name="description" id="description" cols="30" rows="10" :value="old('description')"  style="width: 100%" required></textarea>
            </div>


            <div class="row">
                <div class="col-6">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" type="password" style="width: 100%"  name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="col-6">
                    <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                    <x-text-input id="password_confirmation" type="password" style="width: 100%"  name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button style="background: #0d4c9b;">{{ __('Inscrire') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<script>
    // Script pour basculer entre les formulaires d'utilisateur et d'association
    document.addEventListener('DOMContentLoaded', function() {
        const userForm = document.getElementById('user-form');
        const associationForm = document.getElementById('association-form');

        document.querySelector('a[href="#user-form"]').addEventListener('click', function(e) {
            e.preventDefault();
            userForm.style.display = 'block';
            associationForm.style.display = 'none';
        });

        document.querySelector('a[href="#association-form"]').addEventListener('click', function(e) {
            e.preventDefault();
            userForm.style.display = 'none';
            associationForm.style.display = 'block';
        });
    });
</script>
