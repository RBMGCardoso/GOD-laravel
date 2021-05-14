<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turmas', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned();
            $table->integer('turma_id')->unsigned();

            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos');

            $table->foreign('turma_id')
                ->references('id')
                ->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_turmas');
    }
}
