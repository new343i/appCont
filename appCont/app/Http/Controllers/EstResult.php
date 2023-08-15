<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\totalConcep;

class EstResult extends Controller
{
    protected $totC;
    public function __construct(totalConcep $totC){
        $this->totC = $totC;
    }
    public function index(string $id){
        $est = totalConcep::find($id);

        return view('EstResults', compact('est'));
    }
}
