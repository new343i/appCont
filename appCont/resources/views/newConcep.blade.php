@extends('Plantilla')
@section('nav')
@include('sweetalert::alert')
    <div class='container-fluid'>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance')}}'>Nuevo Balance</a></li>
                <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance.index')}}'>Consultas</a></li>
                <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('BalanceGen.index', $bal->IDBal)}}'>Conceptos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar Concepto</li>
            </ol>
        </nav>
    </div>
    <div class="contenedor">
        <div class="title">
            <h2>{{$bal->NameBal}}</h2>
        </div>
        <div class="formulario">
            <form action="{{route('Concepto.update1', $one->IDCon)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="item">
                    <input type="text" name="Concepto" placeholder="Nombre del Balance..." value="{{$one->Concepto}}">
                    <p class="fv-bold text-danger">{{$errors->first('Concepto')}}</p>
                </div>
                <div class="item">
                    <input type="number" step="any" name="Cantidad" placeholder="Cantidad..." value="{{$one->Cantidad}}">
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
                        @foreach($alltC as $allT)
                            <option value="{{$allT->IDTC}}">{{$allT->TipoConcep}}</option>
                        @endforeach
                    </select>
                    <p class="fv-bold text-danger">{{$errors->first('tipoConcep')}}</p>
                </div>
                <div class="item">
                    <button type="submit" class="btn btn-success">Mandar</button>
                </div>
            </form>
        </div>
    </div>
@stop
