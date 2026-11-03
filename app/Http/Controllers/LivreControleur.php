<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreControleur extends Controller
{
    /**
     * Affiche la liste des livres (et le formulaire d'ajout).
     */
    public function liste()
    {
        $livres = Livre::all();

        return view('livres', ['livres' => $livres]);
    }

    /**
     * Traite le formulaire d'ajout d'un livre.
     */
    public function ajouter(Request $request)
    {
        Livre::create([
            'titre' => $request->input('titre'),
            'auteur' => $request->input('auteur'),
        ]);

        // Retour sur la liste, avec un message flash (affiché une seule fois)
        return redirect('/livres')->with('success', 'Le livre a bien été ajouté');
    }
}
