<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_ocorrencia', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('motivo_id')->unsigned();
            $table->integer('ocorrencia_id')->unsigned();

            $table->foreign('motivo_id')
                ->references('id')
                ->on('motivos');

            $table->foreign('ocorrencia_id')
                ->references('id')
                ->on('ocorrencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_ocorrencia');
    }
}
