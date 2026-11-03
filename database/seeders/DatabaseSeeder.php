<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Remplit la base de données (php artisan db:seed ou migrate --seed).
     */
    public function run(): void
    {
        $this->call(LivreSeeder::class);
    }
}
