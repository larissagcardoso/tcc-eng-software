@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">Gerenciar Clientes</h1>

    <div class="row">

        <div class="col-lg-2">
        </div>

        <div class="col-lg-8">
            <a href="{{route('clientes.create')}}" class="btn btn-primary btn-add">
                <span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    <table class="table table-bordered">

        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Endereço</th>
            <th>Plano</th>
            <th>Dia pagamento</th>
            <th width="100px">Ações</th>

        </tr>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->rg}}</td>
                <td>{{$cliente->endereco}}</td>
                <td>{{$cliente->plano}}</td>
                <td>{{$cliente->dia_pagamento}}</td>
                <td>
                    <a href="{{route('clientes.edit',$cliente->id)}}" class="actions edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="{{route('clientes.show', $cliente->id)}}" class="actions delete">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
            </tr>



    @endforeach
    </table>
        </div>
    </div>
    {!! $clientes->links() !!}

@endsection

