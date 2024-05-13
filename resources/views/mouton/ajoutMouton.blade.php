@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Ajouter un Mouton</h1>
        @if(Auth::check())
             <a href="{{ Auth::user()->profile === 'eleveur' ? route('dashboard') : route('moutons.index') }}" class="btn btn-sm btn-primary">Retour</a>
        @endif
        <form action="{{ route('moutons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom du Mouton</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix du Mouton</label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix') }}" required>
            </div>
            <div class="form-group">
                <label for="generalogie">Généalogie du Mouton</label>
                <input type="text" class="form-control" id="generalogie" name="generalogie" value="{{ old('generalogie') }}" required>
            </div>
            <div class="form-group">
                <label for="race">Race du Mouton</label>
                <input type="text" class="form-control" id="race" name="race" value="{{ old('race') }}" required>
            </div>
            <div class="form-group">
                <label>Image du Mouton</label>
                <input type="file" class="form-control-file" id="images" name="images" value="{{ old('images') }}">
                <label for="Choose file"></label>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le Mouton</button>
        </form>
    </div>
@endsection
