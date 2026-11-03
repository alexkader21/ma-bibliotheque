<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    // Les colonnes que l'on autorise à remplir avec Livre::create([...])
    protected $fillable = ['titre', 'auteur'];
}
