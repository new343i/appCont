<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clasConcep extends Model
{
    use HasFactory;

    protected $table = "clasConcep";
    protected $primaryKey = "IDClas";
    protected $fillable = [
        'IDClas',
        'Clasificación',
        'created_at',
        'updated_at'
    ];

    public function getAllClas(){
        return clasConcep::all();
    }
}
