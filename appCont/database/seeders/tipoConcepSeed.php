<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipoConcep;

class tipoConcepSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tipoConcep::create(['TipoConcep' => 'Banco', 'IDClas' => 2]);
        tipoConcep::create(['TipoConcep' => 'Almacen', 'IDClas' => 2]);
        tipoConcep::create(['TipoConcep' => 'Deudores', 'IDClas' => 2]);
        tipoConcep::create(['TipoConcep' => 'Equipo de Transporte', 'IDClas' => 1]);
        tipoConcep::create(['TipoConcep' => 'Edificio', 'IDClas' => 1]);
        tipoConcep::create(['TipoConcep' => 'Gastos de Organización', 'IDClas' => 3]);
        tipoConcep::create(['TipoConcep' => 'Gastos Financieros', 'IDClas' => 7]);
        tipoConcep::create(['TipoConcep' => 'Depreciación de Edificio', 'IDClas' => 1]);
        tipoConcep::create(['TipoConcep' => 'Depreciación de Equipo de Ofi.', 'IDClas' => 1]);
        tipoConcep::create(['TipoConcep' => 'Depreciación de Equipo de Trans.', 'IDClas' => 1]);
        tipoConcep::create(['TipoConcep' => 'Documentos por Pagar', 'IDClas' => 4]);
        tipoConcep::create(['TipoConcep' => 'Hipoteca por Pagar', 'IDClas' => 5]);
        tipoConcep::create(['TipoConcep' => 'Capital Social', 'IDClas' => 6]);
        tipoConcep::create(['TipoConcep' => 'Acreedores', 'IDClas' => 4]);
        tipoConcep::create(['TipoConcep' => 'Proveedores', 'IDClas' => 4]);
        tipoConcep::create(['TipoConcep' => 'Impuestos por Pagar', 'IDClas' => 4]);
        tipoConcep::create(['TipoConcep' => 'Ventas', 'IDClas' => 7]);
        tipoConcep::create(['TipoConcep' => 'Costos de Ventas', 'IDClas' => 7]);
        tipoConcep::create(['TipoConcep' => 'Gastos de Operación','IDClas' => 7]);
        tipoConcep::create(['TipoConcep' => 'Clientes','IDClas' => 2]);
        tipoConcep::create(['TipoConcep' => 'Productos Financieros', 'IDClas' => 7]);
        tipoConcep::create(['TipoConcep' => 'Equipo de Oficina', 'IDClas' => 1]);
        tipoConcep::create(['TipoConcep' => 'Documentos por Cobrar','IDClas' => 2]);
        tipoConcep::create(['TipoConcep' => 'Anticipo a Proveedores', 'IDClas' => 2]);
        tipoConcep::create(['TipoConcep' => 'Amortización Gastos de Organización', 'IDClas' => 3]);
        tipoConcep::create(['TipoConcep' => 'Otros Gastos', 'IDClas' => 7]);

    }
}
