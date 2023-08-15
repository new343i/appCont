@extends('Plantilla')
@section('nav')
@include('sweetalert::alert')
    <div class='container-fluid'>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance')}}'>Nuevo Balance</a></li>
            <li class="breadcrumb-item active" aria-current="page">Consultas</li>
            </ol>
        </nav>
    </div>
    <div class="contenedor-table">
        <table id="keywords">
            <thead>
                <tr>
                    <th><span></span></th>
                    <th><span>Cantidad</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="lalign">Ventas</td>
                    <td>{{$est->Ventas}}</td>
                </tr>
                <tr>
                    <td class="lalign">Costo de Ventas</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="lalign"><b>Utilidad Bruta</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="lalign">Gastos de Operación</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Productos Financieros</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="lalign">Gastos Financieros</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="lalign">Otros Gastos</td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Total Perdida de la operación</b></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
