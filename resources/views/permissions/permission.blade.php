@extends('layouts.sidebarAdmin')

@section('content')
<div class="container">
    <h2>Gestion des Permissions</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h4>Utilisateurs et Permissions</h4>
            <ul>
                @foreach($users as $user)
                    <li>
                        {{ $user->nom }} - Roles: {{ $user->getRoleNames()->implode(', ') }} - Permissions: {{ $user->getPermissionNames()->implode(', ') }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-12 d-flex">
           <div class="col-md-6">
            <h4>Assigner Permission</h4>
            <form action="{{ route('permissions.assign') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">Utilisateur</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="permission">Permission</label>
                    <select name="permission" id="permission" class="form-control">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="direct">Direct</option>
                        <option value="role">Role</option>
                    </select>
                </div>

                <button style="background: #0d4c9b; color: white;" type="submit" class="btn btn-primary">Assigner</button>
            </form>

           </div>
           <div class="col-md-6">
            <h4>Révoquer Permission</h4>
            <form action="{{ route('permissions.revoke') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id_revoke">Utilisateur</label>
                    <select name="user_id" id="user_id_revoke" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="permission_revoke">Permission</label>
                    <select name="permission" id="permission_revoke" class="form-control">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="type_revoke">Type</label>
                    <select name="type" id="type_revoke" class="form-control">
                        <option value="direct">Direct</option>
                        <option value="role">Role</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">Révoquer</button>
            </form>
           </div>
        </div>
    </div>
</div>
@endsection
