@extends('layouts.base')

@section('title', 'Connexion')

@section('content')
<h1 class="mb-4">Connexion</h1>

<div class="card mb-3" style="max-width: 480px;">
    <div class="card-body">
        <form method="POST" action="/traitementLogin">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>

<p><a href="/register">Pas encore de compte ? Inscrivez-vous</a></p>
@endsection
