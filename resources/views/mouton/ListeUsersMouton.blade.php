@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Liste des Moutons</h1>

        @if(Auth::check())
             <a href="{{ Auth::user()->profile === 'eleveur' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <!-- <th>Généalogie</th>
                    <th>Race</th> -->
                    <th>image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moutons as $mouton)
                    <tr>
                        <td>{{ $mouton->nom }}</td>
                        <td>{{ $mouton->prix }}</td>
                        <!-- <td>{{ $mouton->generalogie }}</td>
                        <td>{{ $mouton->race }}</td> -->
                        <td>
                            @if ($mouton->images)
                            <img src="{{ asset('assets/images/' . $mouton->images) }}" alt="{{ $mouton->nom }}" width="100">
                            @else
                                Aucune image
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('moutons.edit', $mouton->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                <a href="{{ route('moutons.show', $mouton->id) }}" class="btn btn-sm btn-primary">Détails</a>
                                <form action="{{ route('moutons.destroy', $mouton->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce mouton ?')">Supprimer</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
