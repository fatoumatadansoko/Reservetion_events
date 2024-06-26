<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
       

        <!-- Tab navigation --> --}}
    <ul class="flex mb-4">
        <li class="mr-6">
            <a href="#user-form"
                class="text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900">Utilisateur</a>
        </li>
        <li>
            <a href="#association-form"
                class="text-gray-600 py-2 px-4 block hover:text-gray-900 focus:outline-none focus:text-gray-900">Association</a>
        </li>
    </ul>
    <!-- User registration form -->
    <div id="user-form" class="mb-4">
        <h2 class="text-lg font-semibold mb-2">Inscription Utilisateur</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Prenom')" />
            <x-text-input id="prenom" label="Prénom" type="text" name="prenom" :value="old('prenom')" required />
            </div>
            <div>
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="nom" label="Nom" type="text" name="nom" :value="old('nom')" required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Telephone')" />
                <x-text-input id="telephone" label="Téléphone" type="text" name="telephone" :value="old('telephone')"
                    required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Adresse')" />
                <x-text-input id="adresse_utilisateur" label="Adresse" type="text" name="adresse_utilisateur"
                :value="old('adresse_utilisateur')" required />
            </div>
            <div>
                <x-input-label for="name" :value="__('Photo')" />
                <x-text-input id="photo" label="Photo" type="file" name="photo" :value="old('photo')" required />

            </div>
            <div>

                <x-input-label for="name" :value="__('Email')" />
                <x-text-input id="email" label="Email" type="email" name="email" :value="old('email')" required />

            </div>
            <div>
                <x-input-label for="name" :value="__('Mot de passe')" />
                <x-text-input id="password" label="Mot de passe" type="password" name="password" required />          
            </div>
            <div>
                <x-input-label for="name" :value="__('comfirmé le mot de passe')" />
                <x-text-input id="password_confirmation" label="Confirmation du mot de passe" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Register') }}</x-primary-button>
            </div>
        </form>
    </div>
    <!-- Association registration form -->
    <div id="association-form" class="mb-4" style="display: none;">
        <h2 class="text-lg font-semibold mb-2">Inscription Association</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Common fields -->
            <x-text-input id="nom" label="Nom" type="text" name="nom" :value="old('nom')" required
                autofocus />
            <x-text-input id="telephone" label="Téléphone" type="text" name="telephone" :value="old('telephone')"
                required />
            <x-text-input id="photo" label="Photo" type="file" name="photo" :value="old('photo')" required />
            <x-text-input id="email" label="Email" type="email" name="email" :value="old('email')" required />
            <x-text-input id="password" label="Mot de passe" type="password" name="password" required />
            <x-text-input id="password_confirmation" label="Confirmation du mot de passe" type="password"
                name="password_confirmation" required />

            <!-- Association-specific fields -->
            <x-text-input id="adresse_association" label="Adresse" type="text" name="adresse_association"
                :value="old('adresse_association')" required />
            <x-text-input id="description" label="Description" type="text" name="description" :value="old('description')"
                required />
            <x-text-input id="ninea" label="NINEA" type="text" name="ninea" :value="old('ninea')" required />
            <x-text-input id="secteur_activite" label="Secteur d'activité" type="text" name="secteur_activite"
                :value="old('secteur_activite')" required />
            <x-text-input id="date_creation" label="Date de création" type="date" name="date_creation"
                :value="old('date_creation')" required />

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>{{ __('Register') }}</x-primary-button>
            </div>
        </form>
    </div>
    {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}
    {{-- </form> --}}
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
