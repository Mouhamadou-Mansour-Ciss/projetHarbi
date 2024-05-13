@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Détails du Mouton</h1>
            
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/' . $mouton->images) }}" alt="{{ $mouton->nom }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <ul>
                    <li><strong>Nom du Mouton:</strong> {{ $mouton->nom }}</li>
                    <li><strong>Prix du Mouton:</strong> {{ $mouton->prix }}</li>
                    <li><strong>Généalogie du Mouton:</strong> {{ $mouton->generalogie }}</li>
                    <li><strong>Race du Mouton:</strong> {{ $mouton->race }}</li>
                    <li><strong>Prenom de l'Éleveur:</strong> {{ $proprietaire->prenom }}</li>
                    <li><strong>Nom de l'Éleveur:</strong> {{ $proprietaire->nom }}</li>
                    <li><strong>Adresse de l'Éleveur:</strong> {{ $proprietaire->adresse }}</li>
                    <li><strong>Telephone de l'Éleveur:</strong> {{ $proprietaire->telephone }}</li>

                    <!-- Ajoutez d'autres champs si nécessaire -->
                </ul>
                <a href="{{ route('register') }}" class="btn btn-primary">Acheter</a>
            </div>
        </div>
    </div>
@endsection
