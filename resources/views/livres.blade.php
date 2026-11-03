@extends('layouts.base')

@section('title', 'Livres')

@section('content')
<h1 class="mb-4">La bibliothèque</h1>

{{-- Le formulaire n'est affiché qu'aux membres connectés (le middleware protège la route POST) --}}
@auth
    {{-- Le formulaire d'ajout, dans une « card » Bootstrap --}}
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="h5 card-title">Ajouter un livre</h2>
            <form method="POST" action="/livres">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" id="titre" name="titre" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label for="auteur" class="form-label">Auteur</label>
                        <input type="text" id="auteur" name="auteur" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@else
    <p class="mb-4"><a href="/login">Connectez-vous pour ajouter un livre</a></p>
@endauth

{{-- La liste des livres --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Auteur</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livres as $livre)
            <tr>
                <td>{{ $livre->id }}</td>
                <td>{{ $livre->titre }}</td>
                <td>{{ $livre->auteur }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
