<!-- Modal pour l'édition de l'utilisateur -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Édition de l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'édition de l'utilisateur -->
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="prenom{{ $user->id }}" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom{{ $user->id }}" name="prenom" value="{{ $user->prenom }}" required>
                        @if ($errors->has('prenom'))
                            <span class="text-danger">{{ $errors->first('prenom') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="nom{{ $user->id }}" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom{{ $user->id }}" name="nom" value="{{ $user->nom }}" required>
                        @if ($errors->has('nom'))
                            <span class="text-danger">{{ $errors->first('nom') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email{{ $user->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="telephone{{ $user->id }}" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone{{ $user->id }}" name="telephone" value="{{ $user->telephone }}" required>
                        @if ($errors->has('telephone'))
                            <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="permissions{{ $user->id }}" class="form-label">Permissions</label>
                        <select multiple class="form-control" id="permissions{{ $user->id }}" name="permissions[]">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('permissions'))
                            <span class="text-danger">{{ $errors->first('permissions') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
