@extends('painel.templates.template')

@section('content')

    <h1 class="title-pg">Relatório Cliente(s)</h1>

    <div class="row">


        <div class="col-lg-2">
        </div>
    <div class="col-lg-3">
    <div class="form-group" >
        <select class="form-control" name="StatusAluno" >
            <option value >Status Aluno</option>
            <option value="valor1">Matriculado</option>
            <option value="valor2">Inadimplente</option>

        </select>
    </div>
    </div>



        <div class="col-lg-3">
        <div class="form-group">
            <select class="form-control" name="Ordenar">
                <option value >Ordenar</option>
            <option value="valor1">Alfabetifamente</option>
            <option value="valor2" >Data Vencimento</option>
            <option value="valor3" >Data Pagamento</option>
            </select>
        </div>
        </div>

        <div class="col-lg-1">

        <a href="#" class="btn btn-primary btn-add" id="btnFilter">
            <span class="glyphicon glyphicon-filter"></span> Filtrar</a>
        </div>


        <div class="col-lg-1">
        <div class="btn btn btn-success" id="btnExportar" onclick="exportTableToExcel('tblData')">
            <span class="glyphicon glyphicon glyphicon-save"></span> Exportar Relatório
        </div>
        <br>

    </div>



    <table class="table table-bordered" id="tblData">

        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Endereço</th>
            <th>Plano</th>
            <th>Data pagamento</th>
            <th>Data Vencimento</th>



        </tr>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->rg}}</td>
                <td>{{$cliente->endereco}}</td>
                <td>{{$cliente->plano}}</td>
                <td>{{$cliente->dia_pagamento}}/<?php echo date('m/y'); ?></td>
                <td>{{$cliente->dia_pagamento}}/<?php echo date('m/y',strtotime('+30 days')); ?></td>
            </tr>

    @endforeach
    </table>
    {!! $clientes->links() !!}

@endsection

