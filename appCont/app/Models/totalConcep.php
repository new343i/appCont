<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalConcep extends Model
{
    use HasFactory;

    protected $table = 'Balanza';
    protected $primaryKey = 'IDBala';
    protected $fillable = [
        'IDBala',
        'IDBal',
        'IDTC',
        'Tipo',
        'totalDeudor',
        'totalAcreedor',
        'Total',
        'created_at',
        'updated_at'
    ];

    public function getAllBalanza($id){
        return totalConcep::join('tipoConcep', 'tipoConcep.IDTC', '=', 'Balanza.IDTC')
                            ->select('tipoConcep.TipoConcep as Cuentas', 'Balanza.Tipo', 'Balanza.totalDeudor', 'Balanza.totalAcreedor', 'Balanza.Total')
                            ->where('IDBal', $id)
                            ->get();
    }
}
