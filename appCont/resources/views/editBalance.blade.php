@extends('Plantilla')
@section('nav')
@include('sweetalert::alert')
    <div class='container-fluid'>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance')}}'>Nuevo Balance</a></li>
            <li class="breadcrumb-item" aria-current="page"><a style="text-decoration: none" href='{{route('Balance.index')}}'>Consultas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Balance</li>
            </ol>
        </nav>
    </div>
    <div class="contenedor">
        <div class="title">
            <h2>Editar Balance</h2>
        </div>
        <div class="formulario">
            <form action="{{route('Balance.update', $one)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="item">
                    <input type="text" name="nameBal" placeholder="Introduce el nombre del Balance..." value="{{$one->NameBal}}">
                    <input hidden type="number" name="IDBal" value="{{$one->IDBal}}">
                    <p class="fv-bold text-danger">{{$errors->first('nameBal')}}</p>
                </div>
                <div class="item">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop
