<x-guest-layout>
    <!-- Tab navigation -->
    <ul class="flex mb-4">
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

            <div>
                <x-input-label for="prenom" :value="__('Prénom')" />
                <x-text-input id="prenom" type="text" name="prenom" :value="old('prenom')" required />
            </div>
            <div>
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input id="nom" type="text" name="nom" :value="old('nom')" required autofocus />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="telephone" :value="__('Téléphone')" />
                <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')" required />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="adresse_utilisateur" :value="__('Adresse')" />
                <x-text-input id="adresse_utilisateur" type="text" name="adresse_utilisateur" :value="old('adresse_utilisateur')" required />
            </div>
            <div>
                <x-input-label for="photo" :value="__('Photo')" />
                <x-text-input id="photo" type="file" name="photo" required />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Register') }}</x-primary-button>
            </div>
        </form>
    </div>

    <!-- Association registration form -->
    <div id="association-form" class="mb-4" style="display: none;">
        <h2 class="text-lg font-semibold mb-2">Inscription Association</h2>
        <form method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="role" value="association">

            <div>
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input id="nom" type="text" name="nom" :value="old('nom')" required autofocus />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="telephone" :value="__('Téléphone')" />
                <x-text-input id="telephone" type="text" name="telephone" :value="old('telephone')" required />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="photo" :value="__('Photo')" />
                <x-text-input id="photo" type="file" name="photo" required />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Association-specific fields -->
            <div>
                <x-input-label for="adresse_association" :value="__('Adresse')" />
                <x-text-input id="adresse_association" type="text" name="adresse_association" :value="old('adresse_association')" required />
            </div>
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" type="text" name="description" :value="old('description')" required />
            </div>
            <div>
                <x-input-label for="ninea" :value="__('NINEA')" />
                <x-text-input id="ninea" type="text" name="ninea" :value="old('ninea')" required />
            </div>
            <div>
                <x-input-label for="secteur_activite" :value="__('Secteur d\'activité')" />
                <x-text-input id="secteur_activite" type="text" name="secteur_activite" :value="old('secteur_activite')" required />
            </div>
            <div>
                <x-input-label for="date_creation" :value="__('Date de création')" />
                <x-text-input id="date_creation" type="date" name="date_creation" :value="old('date_creation')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Register') }}</x-primary-button>
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

<style>
    /* Style global pour toute la page */
    body {
        background-color: blue;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }
</style>
    