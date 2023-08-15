<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use HasFactory;

    protected $table = 'Concepto';
    protected $primaryKey = 'IDCon';
    protected $fillable = [
        'IDCon',
        'Concepto',
        'Cantidad',
        'Tipo',
        'IDBal',
        'IDTC',
        'created_at',
        'updated_at',
    ];

    public function getAllConceptsDeudor($id){
        return Concepto::join('Balance', 'Balance.IDBal', '=', 'Concepto.IDBal')
                        ->join('tipoConcep', 'tipoConcep.IDTC', '=', 'Concepto.IDTC')
                        ->select('Concepto.Concepto', 'Concepto.Cantidad', 'Balance.NameBal','Concepto.Tipo', 'Concepto.IDCon', 'tipoConcep.TipoConcep')
                        ->where('Concepto.IDBal', '=', $id)
                        ->where('Concepto.Tipo', '=', 'Deudor')
                        ->orderBy('tipoConcep')
                        ->get();
    }
    public function getAllConceptsAcree($id){
        return Concepto::join('Balance', 'Balance.IDBal', '=', 'Concepto.IDBal')
                        ->join('tipoConcep', 'tipoConcep.IDTC', '=', 'Concepto.IDTC')
                        ->select('Concepto.Concepto', 'Concepto.Cantidad', 'Balance.NameBal','Concepto.Tipo', 'Concepto.IDCon', 'tipoConcep.TipoConcep')
                        ->where('Concepto.Tipo', '=', 'Acreedor')
                        ->where('Concepto.IDBal', '=', $id)
                        ->orderBy('tipoConcep')
                        ->get();
    }
}
