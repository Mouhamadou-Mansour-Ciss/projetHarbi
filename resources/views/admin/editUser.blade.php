@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier
                        <strong>{{ $user->name }}</strong>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="roles">Rôles</label>
                            @php
                                $userRole = explode(',', $user->role);
                                $availableRoles = ['admin', 'client', 'eleveur'];
                            @endphp
                            @foreach($availableRoles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="role[]" id="role_{{ $role }}" class="form-check-input" value="{{ $role }}" {{ in_array($role, $userRole) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_{{ $role }}">{{ ucfirst($role) }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Vous pouvez cacher d'autres champs si vous ne voulez pas les modifier ici -->
                        <button type="submit" class="btn btn-primary">Enregistrer le nouveau rôle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
