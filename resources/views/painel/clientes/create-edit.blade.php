@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">  <a href="{{route('clientes.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
        Gestão Cliente: {{$cliente->name or 'Novo'}}</h1>



    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
    @if( isset($errors) && count ($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif


    @if (isset($cliente))
        <form class="form" method="post" action="{{route('clientes.update',$cliente->id)}}">
            {!! method_field('PUT') !!}
            @else
                <form class="form" method="post" action="{{route('clientes.store')}}">
                    @endif

       {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$cliente->name or old('name')}}">
        </div>

        <div class="form-group">
            <input type="text" name="cpf" placeholder="CPF" class="form-control" value="{{$cliente->cpf or old('cpf')}}">
        </div>

        <div class="form-group">
            <input type="text" name="rg" placeholder="RG" class="form-control" value="{{$cliente->rg or old('rg')}}">
        </div>

        <div class="form-group">
            <input type="text" name="endereco" placeholder="Endereço" class="form-control" value="{{$cliente->endereco or old('endereco')}}">
        </div>

        <div class="form-group">
       <select name="plano" class="form-control" >
            <option value="">Escolha o Plano</option>
            @foreach($plano as $planos)
                <option value="{{$planos}}"
                        @if( isset($cliente) && $cliente->plano == $planos)
                        selected
                        @endif
                >{{$planos}}</option>
            @endforeach
       </select>
        </div>

        <div class="form-group">
            <input type="text" name="dia_pagamento" placeholder="Dia Pagamento" class="form-control" value="{{ $cliente->dia_pagamento or old('dia_pagamento')}}">
        </div>


        <button class="btn btn-primary">Salvar</button>

                    </form>
                </form>

    </div>

@endsection