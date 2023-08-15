<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\clasConcep;

class clasConcepSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        clasConcep::create(['Clasificación' => 'Activo Fijo']);
        clasConcep::create(['Clasificación' => 'Activo Circulante']);
        clasConcep::create(['Clasificación' => 'Activo Diferido']);
        clasConcep::create(['Clasificación' => 'Pasivo a Corto Plazo']);
        clasConcep::create(['Clasificación' => 'Pasivo a Largo Plazo']);
        clasConcep::create(['Clasificación' => 'Capital Social']);
        clasConcep::create(['Clasificación' => 'Estado de Resultadoss']);

    }
}
