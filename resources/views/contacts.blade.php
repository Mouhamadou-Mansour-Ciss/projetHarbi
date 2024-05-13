@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Contactez-nous</h1>
        <p>Vous avez des questions, des commentaires ou des préoccupations ? N'hésitez pas à nous contacter en utilisant le formulaire ci-dessous :</p>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection
