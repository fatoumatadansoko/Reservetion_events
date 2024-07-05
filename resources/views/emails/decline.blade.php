<!-- resources/views/emails/reservation_decline.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclinaison de réservation</title>
</head>
<body>
    <p>Bonjour {{ $nom }} {{$prenom}}</p>

    <p>Nous regrettons de vous informer que votre réservation pour l'événement "{{ $evenement->libelle }}" a été déclinée.</p>

    <p>Merci pour votre compréhension.</p>

    <p>Cordialement,</p>
    <p>L'équipe de gestion des réservations</p>
</body>
</html>
