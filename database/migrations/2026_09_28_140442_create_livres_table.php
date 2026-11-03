<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crée la table « livres ».
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('auteur');
            // Colonnes created_at et updated_at
            $table->timestamps();
        });
    }

    /**
     * Supprime la table (utilisé par php artisan migrate:rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
