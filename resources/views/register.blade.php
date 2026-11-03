@extends('layouts.base')

@section('title', 'Inscription')

@section('content')
<h1 class="mb-4">Inscription</h1>

<div class="card mb-3" style="max-width: 480px;">
    <div class="card-body">
        <form method="POST" action="/traitementRegister">
            @csrf
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control" value="{{ old('pseudo') }}" required>
            </div>
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
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</div>

<p><a href="/login">Déjà un compte ? Connectez-vous</a></p>
@endsection
