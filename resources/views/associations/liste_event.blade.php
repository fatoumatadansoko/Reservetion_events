<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
@extends('layouts.sidebarAdmin')
@section('content')
    

  <table class="table" style="font-size:0.875rem ; font-family: 'opens sans' ;">

    <thead>

      <tr>
        <th scope="col">libelle</th>
        <th scope="col">description</th>
        <th scope="col">date</th>
        <th scope="col">Nombre de place</th>
      </tr >

    </thead>
    <tbody>
        @foreach ($evenements as $evenement)
      <tr>
      
        <td>{{ $evenement->libelle }}</td>
        <td>{{ $evenement->description }}</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; "> {{ $evenement->date_evenement }}</p></td>
        <td>{{$evenement->nombre_place}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>


  <style>


 hr {
            height: 0.1rem;
            width: 100%;
            border: 0.3rem solid #000; /* Dark and thick border */
            border-collapse: collapse; /* Ensure that borders are not doubled */
            background: #000;
        }
  </style>

@endsection

</html>
