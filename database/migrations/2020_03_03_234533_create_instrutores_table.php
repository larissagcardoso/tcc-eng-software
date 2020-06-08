<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrutores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('cpf',15);
            $table->string('rg',15);
            $table->enum('atividades',['musculacao','aula em grupo','natacao']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instrutores');
    }
}
