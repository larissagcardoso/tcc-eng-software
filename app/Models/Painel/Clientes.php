<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'name','cpf','rg','endereco','plano','dia_pagamento'
    ];

}
