@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Modifier les coordonnées</h1>
        @if(Auth::check())
             <a href="{{ Auth::user()->profile === 'admin' || Auth::user()->profile === 'eleveur' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('users.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ $user->nom }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ $user->prenom }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                @if ($errors->has('email'))
                    <span class="text-danger">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" value="{{ $user->adresse }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" value="{{ $user->telephone }}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
