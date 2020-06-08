@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg"> <a href="{{route('clientes.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a> <b>Cliente:</b> {{$cliente->name}} </h1>

    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
    <p><b>CPF:</b> {{$cliente->cpf}}</p>
    <p><b>RG:</b> {{$cliente->rg}}</p>
    <p><b>Endereco:</b> {{$cliente->endereco}}</p>
    <p><b>Plano:</b> {{$cliente->plano}}</p>
    <p><b>Dia pagamento:</b> {{$cliente->dia_pagamento}}</p>


    <hr>
    @if( isset($errors) && count ($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    {!! Form::open(['route'=> ['clientes.destroy', $cliente->id],'method'=>'DELETE'])!!}
    {!! Form::submit("Deletar Cliente: $cliente->name", ['class'=> 'btn btn-danger']) !!}
    </div>
@endsection

