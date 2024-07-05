<!-- resources/views/permissions/create.blade.php -->
@extends('layouts.sidebarAdmin')

@section('content')
<div class="container">
    <h2>Ajouter une nouvelle permission</h2>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom de la permission :</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
