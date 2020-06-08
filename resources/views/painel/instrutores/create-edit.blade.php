@extends('painel.templates.template')

@section('content')


    <h1 class="title-pg">  <a href="{{route('clientes.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
        Gestão de Instrutor: {{$instrutor->name or 'Novo'}}</h1>


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


    @if (isset($instrutor))
        <form class="form" method="post" action="{{route('instrutores.update',$instrutor->id)}}">
            {!! method_field('PUT') !!}
    @else
        <form class="form" method="post" action="{{route('instrutores.store')}}">
    @endif


       {!! csrf_field() !!}
        <div class="form-group">
        <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$instrutor->name or old('name')}}">
        </div>


        <div class="form-group">
        <input type="text" name="cpf" placeholder="CPF" class="form-control" value="{{$instrutor->cpf or old('cpf')}}">
        </div>

        <div class="form-group">
            <input type="text" name="rg" placeholder="RG" class="form-control" value="{{$instrutor->rg or old('rg')}}">
        </div>

        <div class="form-group">
       <select name="atividades" class="form-control">
            <option value="">Escolha a Atividade</option>
            @foreach($atividades as $atividade)
                <option value="{{$atividade}}"
                    @if( isset($instrutor) && $instrutor->atividades == $atividade)
                        selected
                    @endif
                >{{$atividade}}</option>
            @endforeach
       </select>
        </div>


        <button class="btn btn-primary">Salvar</button>


        </form>
        </form>
    </div>

@endsection