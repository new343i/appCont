<?php

namespace App\Http\Controllers;

use App\Models\tipoConcep;
use Illuminate\Http\Request;
use App\Models\Concepto;
use App\Models\newB;
use App\Models\totalConcep;
use App\Http\Requests\ConceptoReq;

class newConcepcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $concepto, $tC, $balance, $toC;
    public function __construct(Concepto $concepto, tipoConcep $tC, newB $balance, totalConcep $toC){
        $this->concepto = $concepto;
        $this->tC = $tC;
        $this->balance = $balance;
        $this->toC = $toC;
    }
    public function index($id)
    {
        $one = newB::find($id);
        $conceptos = $this->tC->getAllTC();
        $BGD = json_decode($this->concepto->getAllConceptsDeudor($id), true);
        $BGA = json_decode($this->concepto->getAllConceptsAcree($id), true);
        $maxRows = max(count($BGD), count($BGA));
        for ($i = count($BGD); $i < $maxRows; $i++) {
            $BGD[] = 0;
        }
        for ($i = count($BGA); $i < $maxRows; $i++) {
            $BGA[] = 0;
        }
            //echo $BGD[0]['TipoConcep'];
            //dd($BGD);
        return view('BalanceGen', compact('BGD', 'BGA', 'conceptos', 'maxRows', 'one'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConceptoReq $req, $id)
    {
        Concepto::create([
            'Concepto' => $req->Concepto,
            'Cantidad' => $req->Cantidad,
            'Tipo' => $req->Tipo,
            'IDTC' => $req->tipoConcep,
            'IDBal' => $id
        ]);

        return redirect(route('BalanceGen.index', $id))->withSuccess('Concepto Agregado!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idbal, string $id)
    {
        $bal = newB::find($idbal);
        $alltC = $this->tC->getAllTC();
        $one = Concepto::find($id);
        return view('newConcep', compact('one', 'alltC', 'bal'));
    }

    public function update1(ConceptoReq $req, $id){
        $newConcep = Concepto::findOrFail($id);

        $newConcep->Concepto = $req->Concepto;
        $newConcep->Cantidad = $req->Cantidad;
        $newConcep->Tipo = $req->Tipo;
        $newConcep->IDTC = $req->tipoConcep;

        $newConcep->save();

        return redirect(route('BalanceGen.index', $newConcep->IDBal))->withSuccess('Actualizado Correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $maxAcree = json_decode($req->input('maxAcree'));
        $maxDeu = json_decode($req->input('maxDeu'));
        $Total = json_decode($req->input('Total'));
        $Tipo = json_decode($req->input('Tipo'));
        $IDTC = json_decode($req->input('IDTC'));

        //dd($maxAcree[26]);

        for($i = 0; $i < count($maxAcree); $i++){
            $lol = totalConcep::where('IDBal', $id)
                                ->where('IDTC', $IDTC[$i])
                                //->where('Tipo', $Tipo[$i])
                                ->exists();
            if($lol == false){
                totalConcep::create([
                    'IDBal' => $id,
                    'IDTC' => $IDTC[$i],
                    'Tipo' => $Tipo[$i],
                    'totalDeudor' => $maxDeu[$i],
                    'totalAcreedor' => $maxAcree[$i],
                    'Total' => $Total[$i]
                ]);
            } else {
                //dd($IDTC[$i]);

                $totales = totalConcep::where('IDBal',$id)
                                        ->where('IDTC', $IDTC[$i])
                                        ->firstOrFail();
                $totales->IDTC = $IDTC[$i];
                $totales->Tipo = $Tipo[$i];
                $totales->totalDeudor = $maxDeu[$i];
                $totales->totalAcreedor = $maxAcree[$i];
                $totales->Total = $Total[$i];
                $totales->save();
            }

        }

        return redirect(route('BalanceGen.index', $id))->withSuccess('Totales Agregados / Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
