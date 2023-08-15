<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoConcep extends Model
{
    use HasFactory;

    protected $table = "tipoConcep";
    protected $primaryKey = "IDTC";
    protected $fillable = [
        'IDTC',
        'TipoConcep',
        'created_at',
        'updated_at'
    ];

    public function getAllTC(){
        return tipoConcep::all();
    }
}
