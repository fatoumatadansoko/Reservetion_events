<!-- resources/views/permissions/index.blade.php -->
@extends('layouts.sidebarAdmin')

@section('content')
<div class="container">
    <h2>Liste des permissions</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Ajouter une permission</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
