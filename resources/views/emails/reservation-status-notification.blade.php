@component('mail::message')
# Notification de Statut de la reservation

Bonjour {{ $user->nom }},

Nous voulons vous informer que le statut de votre reservation intitulée **"{{ $evenement->nom }}"** a été mis à jour.

**Statut actuel :** {{ $status }}

@component('mail::button', ['url' => route('evenelents.show', $idee->id)])
Voir la reservation
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
