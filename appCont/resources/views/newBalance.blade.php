@extends('Plantilla')
@section('nav')
@include('sweetalert::alert')
    <div class='container-fluid'>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Nuevo Balance</li>
            </ol>
        </nav>
    </div>
    <div class="contenedor">
        <div class="title">
            <h2>Crear Nuevo Balance</h2>
        </div>
        <div class="formulario">
            <form action="{{route('Balance.store')}}" method="POST">
                @csrf
                <div class="item">
                    <input type="text" name="nameBal" placeholder="Introduce el nombre del Balance..." value="{{old('nameBal')}}">
                    <p class="fv-bold text-danger">{{$errors->first('nameBal')}}</p>
                </div>
                <div class="item">
                    <button type="submit" class="btn btn-success">Mandar</button>
                </div>
            </form>
        </div>
    </div>
@stop
