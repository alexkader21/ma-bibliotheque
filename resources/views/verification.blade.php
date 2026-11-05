@extends('layouts.base')

@section('title', 'Vérification')

@section('content')
<h1 class="mb-4">Vérification du code</h1>

<div class="card mb-3" style="max-width: 480px;">
    <div class="card-body">
        <p>Saisissez le code à 6 chiffres pour confirmer votre connexion.</p>

        <form method="POST" action="/verification">
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Code de vérification</label>
                <input type="text"
                       id="code"
                       name="code"
                       class="form-control"
                       maxlength="6"
                       inputmode="numeric"
                       required>

                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Vérifier le code
            </button>
        </form>
    </div>
</div>
@endsection
