<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('idPregunta');
            $table->string('pregunta');
            $table->string('opcion1');
            $table->string('opcion2');
            $table->string('opcion3');
            $table->string('correcta1');
            $table->string('correcta2');
            $table->string('correcta3');
            $table->unsignedBigInteger('idExamen');
            $table->foreign('idExamen')->references('idExamen')->on('examenes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
