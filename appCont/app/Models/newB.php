<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newB extends Model
{
    use HasFactory;
    protected $table = 'Balance';
    protected $primaryKey = 'IDBal';
    protected $fillable = [
        'IDBal',
        'NameBal',
        'created_at',
        'updated_at'
    ];

    public function getAllBal(){
        return newB::select('IDBal', 'NameBal', 'created_at', 'updated_at')
                    ->paginate(5);
    }

    public function getOneBal($id){
        return newB::select('NameBal')->where('IDBal', '=', $id)->get();
    }
}
