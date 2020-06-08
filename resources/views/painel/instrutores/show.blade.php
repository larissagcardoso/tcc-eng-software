@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg"> <a href="{{route('instrutores.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a> <b>Instrutor:</b> {{$instrutor->name}} </h1>

    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
    <p><b>CPF:</b> {{$instrutor->cpf}}</p>
    <p><b>RG:</b> {{$instrutor->rg}}</p>
    <p><b>Atividades:</b> {{$instrutor->atividades}}</p>


    <hr>
    @if( isset($errors) && count ($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    {!! Form::open(['route'=> ['instrutores.destroy', $instrutor->id],'method'=>'DELETE'])!!}
    {!! Form::submit("Deletar Instrutor: $instrutor->name", ['class'=> 'btn btn-danger']) !!}

    </div>
@endsection

