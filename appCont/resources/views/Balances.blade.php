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
                    <th><span>ID</span></th>
                    <th><span>Nombre</span></th>
                    <th><span>Creado</span></th>
                    <th><span>Modificado</span></th>
                    <th><span>Editar</span></th>
                    <th><span>Balanza</span></th>
                    <th><span>Est.Res</span></th>
                    <th><span>Balance</span></th>
                    <th><span>Eliminar</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $a)
                        <tr>
                            <td class="lalign">{{$a->IDBal}}</td>
                            <td>{{$a->NameBal}}</td>
                            <td>{{$a->created_at}}</td>
                            <td>{{$a->updated_at}}</td>
                            <td><a class="btn btn-outline-primary" href="{{route('Balance.edit', $a->IDBal)}}">Edit</a></td>
                            <td><a class="btn btn-outline-success" href="{{route('Balanza.index', $a->IDBal)}}">Go</a></td>
                            <td><a class="btn btn-outline-primary" href="{{route('estResult.index', $a->IDBal)}}">Go</a></td>
                            <td><a class="btn btn-outline-secondary" href="{{route('BalanceGen.index', $a->IDBal)}}">Consult</a></td>
                            <td><a class="btn btn-outline-danger" href="{{route('Balance.destroy', $a->IDBal)}}" data-confirm-delete="true">Delete</a></td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginate">
        {!! $all->links('vendor.pagination.bootstrap-4') !!}
    </div>

@stop
