@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="my-4">Détails de l'Utilisateur</h1>
    @if(Auth::check())
        <a href="{{ Auth::user()->profile === 'admin' ? route('dashboard') : route('moutons.index') }}" class="btn btn-primary mb-3"><i class="fa fa-arrow-left me-2"></i> Retour</a>
    @endif

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Nom: {{ $user->nom }}</h3>
            <h3 class="card-title">Prenom: {{ $user->prenom }}</h3>
            <h3 class="card-title">Email: {{ $user->email }}</h3>
            <h3 class="card-title">Adresse: {{ $user->adresse }}</h3>
            <h3 class="card-title">Téléphone: {{ $user->telephone }}</h3>
            <h3 class="card-title">Profile: {{ $user->profile }}</h3>
            <h3 class="card-title">Statut: {{ $user->statut ? 'Bloqué' : 'Actif' }}</h3>
        </div>
    </div>
</div>
@endsection
