<?php

namespace Database\Seeders;

use App\Models\Livre;
use Illuminate\Database\Seeder;

class LivreSeeder extends Seeder
{
    /**
     * Quelques livres pour ne pas démarrer avec une bibliothèque vide.
     */
    public function run(): void
    {
        Livre::create(['titre' => 'Le Petit Prince', 'auteur' => 'Antoine de Saint-Exupéry']);
        Livre::create(['titre' => "L'Étranger", 'auteur' => 'Albert Camus']);
        Livre::create(['titre' => 'Les Misérables', 'auteur' => 'Victor Hugo']);
    }
}
