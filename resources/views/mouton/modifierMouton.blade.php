@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Modifier un Moutons</h1>
        @if(Auth::check())
                    <a href="{{ Auth::user()->profile === 'eleveur' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
                @endif
        <form action="{{ route('moutons.update', $mouton->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Utilisez la méthode PUT pour la mise à jour dashboard -->

            <div class="form-group">
                <label for="nom">Nom du Mouton</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $mouton->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix du Mouton</label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{ $mouton->prix }}" required>
            </div>
            <div class="form-group">
                <label for="generalogie">Généalogie du Mouton</label>
                <input type="text" class="form-control" id="generalogie" name="generalogie" value="{{ $mouton->generalogie }}" required>
            </div>
            <div class="form-group">
                <label for="race">Race du Mouton</label>
                <input type="text" class="form-control" id="race" name="race" value="{{ $mouton->race }}" required>
            </div>

            <div class="form-group">
                <label for="images">Image du Mouton</label>
                <input type="file" class="form-control-file" id="images" name="images">
                <!-- Affichez ici l'image actuelle du mouton si vous le souhaitez -->
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le Mouton</button>
        </form>
    </div>
@endsection
