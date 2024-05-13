
@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Modifier le mot de passe</h1>
        @if(Auth::check())
             <a href="{{ Auth::user()->profile === 'admin' || Auth::user()->profile === 'eleveur' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('users.updatePassword') }}">
            @csrf
            <div class="form-group">
                <label for="ancien_password">Ancien mot de passe</label>
                <input type="password" class="form-control" id="ancien_password" name="ancien_password">
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmez le nouveau mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le mot de passe</button>
        </form>
    </div>
@endsection

