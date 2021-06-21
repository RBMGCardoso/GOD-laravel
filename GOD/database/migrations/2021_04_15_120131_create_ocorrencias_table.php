<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('aluno_id')->unsigned();
            $table->dateTime('data');
            $table->string('descricao');
            $table->string('decisao');
            $table->string('frequencia');
            $table->string('comport_inc');
            $table->string('cod_p');
            $table->string('estado');
            $table->string('motivo')->nullable(); //mostra o motivo para a ocorrencia ter sido aceite ou recusada

            $table->foreign('aluno_id')->references('id')->on('alunos');
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
        Schema::dropIfExists('ocorrencias');
    }
}
