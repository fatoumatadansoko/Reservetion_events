<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Réservation</title>
</head>
<body>
    <h1>Notification de la Réservation</h1>

    <p>Bonjour {{ $user->utilisateur->prenom }} {{ $user->nom }},</p>

    <p>Nous voulons vous informer que votre réservation sur l'évènement <strong>{{ $evenement->libelle }}</strong> a bien réussi.</p>

    <p><strong>Détails de l'événement :</strong></p>
    <ul>
        <li><strong>Lieu :</strong> {{ $evenement->lieu }}</li>
        <li><strong>Date de l'événement :</strong> {{ $evenement->date_evenement }}</li>
        <li><strong>Date limite d'inscription :</strong> {{ $evenement->date_limite_inscription }}</li>
        <li><strong>Nombre de places :</strong> {{ $evenement->nombre_place }}</li>
        <li><strong>Description :</strong> {{ $evenement->description }}</li>
    </ul>

    <p><strong>Statut actuel :</strong> {{ $reservation->statut }}</p>

    <p>Merci,<br>
    <p>{{ $reservation->created_at }}</p>
</body>
</html>
