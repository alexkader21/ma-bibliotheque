<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthentificationControleur extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Affiche le formulaire d'inscription.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Traite le formulaire d'inscription.
     */
    public function traitementRegister(Request $request)
    {
        // Un email ne peut être utilisé qu'une seule fois
        if (Membre::where('email', $request->input('email'))->exists()) {
            return redirect('/register')
                ->withInput($request->only('pseudo', 'email')) // Jamais le mot de passe !
                ->withErrors(['email' => 'Cet email est déjà utilisé']);
        }

        // On stocke le HASH du mot de passe, jamais le mot de passe en clair
        $hash = password_hash($request->input('password'), PASSWORD_DEFAULT);

        Membre::create([
            'pseudo' => $request->input('pseudo'),
            'email' => $request->input('email'),
            'password' => $hash,
        ]);

        return redirect('/login')->with('success', 'Votre compte a été créé, vous pouvez vous connecter');
    }

    /**
     * Traite le formulaire de connexion.
     */
    public function traitementLogin(Request $request)
    {
        $membre = Membre::where('email', $request->input('email'))->first();

        // Email inconnu : même message qu'un mauvais mot de passe
        if ($membre === null) {
            return $this->identifiantsIncorrects($request);
        }

        $estValide = password_verify($request->input('password'), $membre->password);

        if ($estValide) {
            // Un code aléatoire à 6 chiffres (str_pad ajoute les zéros de tête : 007243)
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            $membre->two_factor_code = $code;
            $membre->two_factor_expires_at = now()->addMinutes(10);
            $membre->save();

            // « Envoi » du code : dans ce TP, il est écrit dans le fichier de log
            Log::info("Code 2FA pour {$membre->email} : {$code}");

            // On mémorise qui est en cours de connexion (mais PAS encore connecté)
            $request->session()->put('2fa_email', $membre->email);

            return redirect('/verification');
        }

        return $this->identifiantsIncorrects($request);
    }

    /**
     * Déconnecte le membre.
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    /**
     * Retour au formulaire de connexion, avec l'email conservé.
     */
    private function identifiantsIncorrects(Request $request)
    {
        return redirect('/login')
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Identifiants incorrects']);
    }
}
