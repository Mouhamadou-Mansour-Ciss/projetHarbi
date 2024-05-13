@extends('layout.app') <!-- Assurez-vous d'avoir un modèle de mise en page pour le tableau de bord de l'administrateur -->

@section('content')
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        @if(Auth::check())
             <a href="{{ Auth::user()->profile === 'admin' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.showUser', $user->id) }}" class="btn btn-sm btn-info">Détails</a>
                                
                                @if ($user->statut)
                                    <form action="{{ route('admin.deBloquer', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Débloquer</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.bloquer', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning">Bloquer</button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
