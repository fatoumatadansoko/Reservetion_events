<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('liste.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


@extends('layouts.sidebarAssociation')
@section('content')
<table class="table" style="font-size:0.875rem ; font-family: 'opens sans' ;">

    <thead>

      <tr>
        <th scope="col">libelle</th>
        <th scope="col">description</th>
        <th scope="col">date</th>
        <th scope="col">Nombre de place</th>
        <th scope="col">Action</th>

      </tr >

    </thead>
    <tbody>
      <tr>
        <td>Hachaton</td>
        <td>graduation day</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; "> 21/12/2024</p></td>
        <td>700</td>
        <td><i class="fa-solid fa-ellipsis"></i></td>
      </tr>
      <tr>
        <td>Hachaton</td>
        <td>graduation day</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; "> 21/12/2024</p></td>
        <td>700</td>
        <td><i class="fa-solid fa-ellipsis"></i></td>
      </tr>
      <tr>
        <td>Hachaton</td>
        <td>graduation day</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; "> 21/12/2024</p></td>
        <td>700</td>
        <td><i class="fa-solid fa-ellipsis"></i></td>
      </tr>
      <tr>
        <td>Hachaton</td>
        <td>graduation day</td>
        <td> <p style="border: 0.01rem solid #000; border-radius: 10rem ; padding: 0.2rem 0.4rem;display: inline-block; "> 21/12/2024</p></td>
        <td>700</td>
        <td><i class="fa-solid fa-ellipsis"></i></td>
      </tr>


    </tbody>
  </table>

@endsection