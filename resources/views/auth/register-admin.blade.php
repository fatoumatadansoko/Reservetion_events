<form method="POST" action="{{ route('register.admin') }}">
    @csrf
    <!-- Champs spécifiques pour l'administrateur -->
    <x-label for="nom" :value="__('Nom')" />
    <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
    <!-- Autres champs pour l'administrateur -->
</form>
