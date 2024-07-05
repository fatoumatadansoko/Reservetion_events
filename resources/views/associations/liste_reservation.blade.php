<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste des reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @extends('layouts.sidebarAssociation')
    @section('content')
    <div class="container mt-5">
        <h1 class="text-center m-2">Liste de l'événement {{ $evenement->libelle }}</h1>
        <h2>Liste des réservations</h2>
        <table class="table" style="font-size:0.875rem; font-family: 'opens sans';">
            <thead>
                <tr>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="reservation-list">
                @foreach ($evenement->reservations as $reservation)
                <tr>
                    <td>{{ $reservation->utilisateur->prenom }}</td>
                    <td>{{ $reservation->utilisateur->user->nom }}</td>
                    <td><p style="border: 0.01rem solid #000; border-radius: 10rem; padding: 0.2rem 0.4rem; display: inline-block;">{{ $reservation->utilisateur->user->email }}</p></td>
                    <td>{{ $reservation->utilisateur->user->telephone }}</td>
                    <td>{{ $reservation->statut }}</td>
                    <td>
                        @if ($reservation->statut === 'declinée')
                        <h5>Déjà décliné</h5>
                        @else
                        <form action="{{ route('reserverdecline') }}" method="POST">
                            @csrf
                            <input type="hidden" name="libelle_evenement" value="{{ $evenement->libelle }}">
                            <input type="hidden" name="email" value="{{ $reservation->utilisateur->user->email }}">
                            <input type="hidden" name="prenom" value="{{ $reservation->utilisateur->prenom }}">
                            <input type="hidden" name="nom" value="{{ $reservation->utilisateur->user->nom }}">
                            <input type="hidden" name="id" value="{{ $reservation->id }}">
                            <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
                            <input type="hidden" name="utilisateur_id" value="{{ $reservation->utilisateur_id }}">
                            <button type="submit" class="btn btn-danger">Décliner</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="btn-custom">
        <button class="btn mt-3" id="download-pdf">Télécharger PDF</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#download-pdf').click(function () {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Ajouter le titre
                doc.setFontSize(18);
                doc.text('Liste des Réservations', 10, 10);

                // Ajouter les réservations
                let y = 20;
                $('#reservation-list tr').each(function () {
                    const statut = $(this).find('td').eq(4).text().trim();
                    if (statut !== 'declinée') {
                        const prenom = $(this).find('td').eq(0).text();
                        const nom = $(this).find('td').eq(1).text();
                        const email = $(this).find('td').eq(2).text();
                        const contact = $(this).find('td').eq(3).text();
                        const text = `Prenom: ${prenom}, Nom: ${nom}, Email: ${email}, Contact: ${contact}`;
                        doc.setFontSize(12);
                        doc.text(text, 10, y);
                        y += 10;
                    }
                });

                // Télécharger le PDF
                doc.save('reservations.pdf');
            });
        });
    </script>
    <style>
        hr {
            height: 0.1rem;
            width: 100%;
            border: 0.3rem solid #000; /* Dark and thick border */
            border-collapse: collapse; /* Ensure that borders are not doubled */
            background: #000;
        }
        .btn-custom button {
          background-color: #0D4C9B;
          color: white;
        }
    </style>
    @endsection
</body>
</html>
