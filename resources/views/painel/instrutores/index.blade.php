@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">Gerenciar Instrutores</h1>

    <div class="row">

        <div class="col-lg-2">
        </div>

        <div class="col-lg-8">
    <a href="{{route('instrutores.create')}}" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    <table class="table table-bordered">

        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Atividades</th>
            <th width="100px">Ações</th>

        </tr>
        @foreach($instrutores as $instrutor)
            <tr>
                <td>{{$instrutor->name}}</td>
                <td>{{$instrutor->cpf}}</td>
                <td>{{$instrutor->rg}}</td>
                <td>{{$instrutor->atividades}}</td>
                <td>
                    <a href="{{route('instrutores.edit',$instrutor->id)}}" class="actions edit">
                        {!! method_field('DELETE') !!}
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <a href="{{route('instrutores.show', $instrutor->id)}}" class="actions delete">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
            </tr>

    @endforeach
    </table>
    </div>
    </div>
    {!! $instrutores->links() !!}
@endsection

