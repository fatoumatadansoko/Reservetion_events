<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
@extends('layouts.sidebarAdmin')
@section('content')


<table class="table" style="font-size:0.875rem; font-family: 'Open Sans';">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Association</th>
            <th scope="col">Status</th>
            <th scope="col">Types</th>
            <th scope="col">Ninea</th>
            <th scope="col">Contact</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody style="text-align:start; align-items: center;">
        @foreach ($associations as $association)
        <tr>
            <td>
                <img src="{{ asset('storage/'. $association->user->photo) }}" alt="" style="width:3rem; height:3rem; object-fit:cover;"> {{ $association->name }}
            </td>
            <td>
                {{ $association->user->nom }}
            </td>
            <td>
                @if($association->is_active)
                <p style="vertical-align: bottom; border: 0.01rem solid #7FC008; color:#7FC008; font-weight: 500; border-radius: 0.25rem; padding: 0.2rem 0.4rem; display: inline-block;">Activé</p>
                @else
                <p style="vertical-align: bottom; border: 0.01rem solid #FF0000; color:#FF0000; font-weight: 500; border-radius: 0.25rem; padding: 0.2rem 0.4rem; display: inline-block;">Désactivé</p>
                @endif
            </td>
            <td>{{ $association->secteur_activite }}</td>
            <td>
                <p style="border: 0.01rem solid #000; border-radius: 10rem; padding: 0.2rem 0.4rem; display: inline-block; align-items: center;">{{ $association->ninea }}</p>
            </td>
            <td>{{ $association->user->telephone }}</td>
            <td>
                <form method="POST" action="{{ route('toggle.association.status', $association->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-link">
                        @if($association->is_active)
                            <i class="fas fa-toggle-on" style="color: green;"></i>
                        @else
                            <i class="fas fa-toggle-off" style="color: red;"></i>
                        @endif
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{$associations->links()}}
</div>
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



