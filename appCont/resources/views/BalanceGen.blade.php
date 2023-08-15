@extends('Plantilla')
@section('nav')
@include('sweetalert::alert')
    <div class='container-fluid'>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance')}}'>Nuevo Balance</a></li>
            <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance.index')}}'>Consultas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Balance General</li>
            </ol>
        </nav>
    </div>
    <div style="text-align: center; margin-bottom: 20px;">
        <button type="button" href="button" class="btn btn-outline-success" id="sendAll">Guardar Totales</button>
        <script>
            document.getElementById('sendAll').addEventListener('click', function() {
                document.getElementById('formularioEnvio').submit();
            });
        </script>
    </div>
    <div style="text-align: center; margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal">
        <button type="button" href="" class="btn btn-outline-primary">Nuevo Concepto</button>
    </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="title">
                    <h2>Nuevo Concepto de {{$one->NameBal}}</h2>
                </div>
                <form action="{{route('Concepto.store', $one->IDBal)}}" method="POST">
                    @csrf
                    <div class="item">
                        <input type="text" name="Concepto" placeholder="Nombre del Balance..." value="{{old('Concepto')}}">
                        <p class="fv-bold text-danger">{{$errors->first('Concepto')}}</p>
                    </div>
                    <div class="item">
                        <input type="number" step="any" name="Cantidad" placeholder="Cantidad..." value="{{old('Cantidad')}}">
                        <p class="fv-bold text-danger">{{$errors->first('Cantidad')}}</p>
                    </div>
                    <div class="item">
                        <select name="Tipo">
                            <option value="" selected disabled>Tipo...</option>
                            <option value="Deudor">Deudor</option>
                            <option value="Acreedor">Acreedor</option>
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('Tipo')}}</p>
                    </div>
                    <div class="item">
                        <select name="tipoConcep">
                            <option value="" selected disabled>Tipo de Concepto...</option>
                            @foreach($conceptos as $allT)
                                <option value="{{$allT->IDTC}}">{{$allT->TipoConcep}}</option>
                            @endforeach
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('tipoConcep')}}</p>
                    </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
            <symbol id="prov" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </symbol>
        </svg>
    <div class="contenedor-table-bal">
    @php
        $maxAcree = array();
        $maxDeu = array();
        $Total = array();
        $Tipo = array();
        $IDTC = array();
        $IDBal = array();
    @endphp
    @foreach ($conceptos as $c)
    <form action="{{route('Concepto.update', $one->IDBal)}}" method="post" id="formularioEnvio">
        @csrf
        @method('PUT')
            <table class="table" id="keywords1">
                <thead>
                    <tr>
                        <th colspan="4"><span>{{$c->TipoConcep}}</span></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $maxBGD = 0;
                        $maxBGA = 0;
                    @endphp
                    @for ($i = 0; $i < $maxRows; $i++)
                        @php
                            $BGDBool = 0;
                            $BGABool = 0;
                        @endphp
                        <tr>
                            @if (($BGD[$i]['TipoConcep'] ?? 0) == $c->TipoConcep && ($BGA[$i]['TipoConcep'] ?? 0) == $c->TipoConcep)
                                <td>{{$BGD[$i]['Cantidad'] ?? 0}}</td>
                                <td><a href="{{route('Concepto.edit', [$one->IDBal, $BGD[$i]['IDCon'] ?? 0])}}" class="btn btn-outline-primary"><svg class="bi" width="30" height="30"><use xlink:href="#prov" fill="#b2e3fa"/></svg></a></td>
                                <td>{{$BGA[$i]['Cantidad'] ?? 0}}</td>
                                <td><a href="{{route('Concepto.edit', [$one->IDBal, $BGA[$i]['IDCon'] ?? 0])}}" class="btn btn-outline-primary"><svg class="bi" width="30" height="30"><use xlink:href="#prov" fill="#b2e3fa"/></svg></a></td>
                                @php
                                    $maxBGD += $BGD[$i]['Cantidad'] ?? 0;
                                    $maxBGA += $BGA[$i]['Cantidad'] ?? 0;
                                @endphp
                            @else
                                @if (($BGD[$i]['TipoConcep'] ?? 0) == $c->TipoConcep)
                                    <td>{{$BGD[$i]['Cantidad'] ?? 0}}</td>
                                    <td><a href="{{route('Concepto.edit', [$one->IDBal, $BGD[$i]['IDCon'] ?? 0])}}" class="btn btn-outline-primary"><svg class="bi" width="30" height="30"><use xlink:href="#prov" fill="#b2e3fa"/></svg></a></td>
                                    <td>0</td>
                                    <td></td>
                                    @php
                                        $maxBGD += $BGD[$i]['Cantidad'] ?? 0;
                                    @endphp
                                @endif
                                @if (($BGA[$i]['TipoConcep'] ?? 0) == $c->TipoConcep)
                                    <td>0</td>
                                    <td></td>
                                    <td>{{$BGA[$i]['Cantidad'] ?? 0}}</td>
                                    <td><a href="{{route('Concepto.edit', [$one->IDBal, $BGA[$i]['IDCon'] ?? 0])}}" class="btn btn-outline-primary"><svg class="bi" width="30" height="30"><use xlink:href="#prov" fill="#b2e3fa"/></svg></a></td>
                                    @php
                                        $maxBGA += $BGA[$i]['Cantidad'] ?? 0;
                                    @endphp
                                @endif
                            @endif
                        </tr>
                    @endfor
                        <tr>
                            <td style="background-color: lightsteelblue">{{$maxBGD}}</td>
                            <td style="background-color: lightsteelblue"></td>
                            <td style="background-color: lightsteelblue">{{$maxBGA}}</td>
                            <td style="background-color: lightsteelblue"></td>
                        </tr>
                        <tr>
                            @if (($maxBGA - $maxBGD) < 0)
                                <td style="background-color:#f54021; font-size: 24px; color: black; text-align:center;" colspan="2">{{-1*($maxBGA - $maxBGD)}}</td>
                            @else
                                <td colspan="2"></td>
                                <td style="background-color: #00bb2d; font-size: 24px; color: black; text-align:center;" colspan="2">{{($maxBGA - $maxBGD)}}</td>
                            @endif
                        </tr>

                </tbody>

            </table>
            <input hidden name="maxAcree" type="text" id="maxAcree">
            <input hidden name="maxDeu" type="text" id="maxDeu">
            @if (($maxBGA - $maxBGD) < 0)
                <input hidden name="Total" type="text" id="Total">
                <input hidden name="Tipo" type="text" id="Tipo">
                @php
                    $Total[] = -1*($maxBGA - $maxBGD);
                    $Tipo[] = 'Deudor';
                @endphp
            @else
                <input hidden name="Total" type="text" id="Total">
                <input hidden name="Tipo" type="text" id="Tipo">
                @php
                    $Total[] = ($maxBGA - $maxBGD);
                    $Tipo[] = 'Acreedor';
                @endphp

            @endif
            <input hidden type="text" name="IDTC" id="IDTC">
            <input hidden type="text" name="IDBal" value="{{$one->IDBal}}">

            @php
                $maxAcree[] = $maxBGA;
                $maxDeu[] = $maxBGD;
                $IDTC[] = $c->IDTC;
            @endphp

            <script>
                var maxAcree = @json($maxAcree);
                document.getElementById('maxAcree').value = JSON.stringify(maxAcree);

                var maxDeu = @json($maxDeu);
                document.getElementById('maxDeu').value = JSON.stringify(maxDeu);

                var Total = @json($Total);
                document.getElementById('Total').value = JSON.stringify(Total);

                var Tipo = @json($Tipo);
                document.getElementById('Tipo').value = JSON.stringify(Tipo);

                var IDTC = @json($IDTC);
                document.getElementById('IDTC').value = JSON.stringify(IDTC);
            </script>

            <!--<button type=text"submit">LOL</button>-->
    </form>
    @endforeach
    </div>
@stop
