<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newB;
use App\Models\clasConcep;
use App\Models\tipoConcep;
use App\Http\Requests\newBReq;

class newBalanceControl extends Controller
{
    protected $newBalance, $clasC, $tipoC;

    public function __construct(newB $newBalance, tipoConcep $tipoC, clasConcep $clasC){
        $this->newBalance=$newBalance;
        $this->tipoC=$tipoC;
        $this->clasC=$clasC;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = $this->newBalance->getAllBal();
        $title = 'Borrando Balance!';
        $text = "Todos los conceptos relacionados serán eliminados";
        confirmDelete($title, $text);
        return view('Balances', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newBalance');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(newBReq $req)
    {
        $newBalance = newB::create([
            'NameBal' => $req->nameBal
        ]);

        return redirect(route('Balance.index'))->withSuccess('Guardado correctamente !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alltC = $this->tipoC->getAllTC();
        $allcC = $this->clasC->getAllClas();
        $one = newB::find($id);
        return view('newConcep', compact('one', 'alltC', 'allcC'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $one = newB::find($id);
        return view('editBalance', compact('one'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(newBReq $req, $one)
    {
        $newB = newB::findOrFail($one);
        $newB->NameBal = $req->nameBal;
        $newB->save();
        return redirect(route('Balance.index'))->withSuccess('Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newB = newB::findOrFail($id);
        $newB->delete();
        return redirect(route('Balance.index'))->withSuccess('Eliminado Correctamente');
    }
}
