@extends('Plantilla')
@section('nav')
@include('sweetalert::alert')
    <div class='container-fluid'>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance')}}'>Nuevo Balance</a></li>
                <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance.index')}}'>Consultas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Balanza General</li>
            </ol>
        </nav>
    </div>
    <div class="contenedor-table" style="margin-top: -130px">
        <table id="keywords">
            <thead>
                <tr>
                    <th><span></span></th>
                    <th colspan="2"><span>Balanza de Movimientos</span></th>
                    <th colspan="2"><span>Balanza de Saldos</span></th>
                </tr>
                <tr>
                    <th><span>Cuentas</span></th>
                    <th><span>Deudor</span></th>
                    <th><span>Acreedor</span></th>
                    <th><span>Deudor</span></th>
                    <th><span>Acreedor</span></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $maxTotalD = 0;
                    $maxTotalA = 0;
                    $maxTotA = 0;
                    $maxTotD = 0;
                @endphp
                @foreach($Bal as $b)
                <tr>
                    <td>{{$b->Cuentas}}</td>
                    <td>{{$b->totalDeudor}}</td>
                    <td>{{$b->totalAcreedor}}</td>
                    @php
                        $maxTotalD += $b->totalDeudor;
                        $maxTotalA += $b->totalAcreedor;
                    @endphp
                    @if($b->Tipo == 'Acreedor')
                        <td>0</td>
                        <td>{{$b->Total}}</td>
                        @php
                            $maxTotA += $b->Total;
                        @endphp
                    @else
                        <td>{{$b->Total}}</td>
                        <td>0</td>
                        @php
                            $maxTotD += $b->Total;
                        @endphp
                    @endif
                </tr>
                @endforeach
                <tr>
                    <td>Totales</td>
                    <td>{{$maxTotalD}}</td>
                    <td>{{$maxTotalA}}</td>
                    <td>{{$maxTotD}}</td>
                    <td>{{$maxTotA}}</td>
                </tr>
            </tbody>
        </table>
    </div>

@stop
