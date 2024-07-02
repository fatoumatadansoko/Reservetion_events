<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Réservation</title>
</head>
<body>
    # Notification de la réservation

Bonjour {{ auth()->user()->utilisateur->prenom }} {{  auth()->user()->nom}},

{{-- Nous voulons vous informer que votre réservation sur l'évènement **"{{ $evenement['libelle'] }}"** a bien reussi. --}}

**Statut actuel :** {{ $reservation['statut'] }}


Merci,<br>
    <p>{{ $reservation['created_at'] }}</p>
</body>
</html>
