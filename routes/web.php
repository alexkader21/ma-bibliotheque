<?php

use App\Http\Controllers\AuthentificationControleur;
use App\Http\Controllers\LivreControleur;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

// La page d'accueil renvoie directement vers la liste des livres
Route::get('/', function () {
    return redirect('/livres');
});

// La liste reste publique, seul l'ajout est réservé aux membres connectés
Route::get('/livres', [LivreControleur::class, 'liste']);
Route::post('/livres', [LivreControleur::class, 'ajouter'])->middleware(CheckAuth::class);

// Authentification
Route::get('/login', [AuthentificationControleur::class, 'login']);
Route::post('/traitementLogin', [AuthentificationControleur::class, 'traitementLogin']);
Route::get('/register', [AuthentificationControleur::class, 'register']);
Route::post('/traitementRegister', [AuthentificationControleur::class, 'traitementRegister']);
Route::get('/logout', [AuthentificationControleur::class, 'logout']);
