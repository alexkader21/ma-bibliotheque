<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

// Authenticatable est un Model enrichi de ce qu'il faut pour être « connectable »
class Membre extends Authenticatable
{
    // Les colonnes que l'on autorise à remplir avec Membre::create([...])
    protected $fillable = ['pseudo', 'email', 'password'];
}
