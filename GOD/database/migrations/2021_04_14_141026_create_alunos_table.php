<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nome');
            $table->date('datanasc');
            $table->string('email');
            $table->string('nif');
            $table->string('telef');
            $table->string('morada');
            $table->string('concelho');
            $table->string('codpost');
            $table->string('cc');

            $table->integer('eeId')->nullable()->unsigned();
            $table->foreign('eeId')->references('id')->on('encarregados');

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
        Schema::dropIfExists('alunos');
    }
}
