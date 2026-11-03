<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crée la table « membres ».
     */
    public function up(): void
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo');
            $table->string('email')->unique();
            // Le hash du mot de passe, jamais le mot de passe en clair
            $table->string('password');
            // Colonnes created_at et updated_at
            $table->timestamps();
        });
    }

    /**
     * Supprime la table (utilisé par php artisan migrate:rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};
