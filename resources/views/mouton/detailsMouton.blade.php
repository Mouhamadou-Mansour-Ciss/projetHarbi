@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Détails du Mouton</h1>
            @if(Auth::check())
                <a href="{{ Auth::user()->profile === 'eleveur' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
            @endif
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
                    @auth
                        <li><strong>Vos informations:</strong></li>
                        <li><strong>Nom de l'Utilisateur:</strong> {{ auth()->user()->nom }}</li>
                        <li><strong>Prénom de l'Utilisateur:</strong> {{ auth()->user()->prenom }}</li>
                        <li><strong>Adresse de l'Utilisateur:</strong> {{ auth()->user()->adresse }}</li>
                        <li><strong>Numéro de téléphone de l'Utilisateur:</strong> {{ auth()->user()->telephone }}</li>
                    @endauth
                    <!-- Ajoutez d'autres champs si nécessaire -->
                </ul>
            </div>
        </div>
    </div>
@endsection
