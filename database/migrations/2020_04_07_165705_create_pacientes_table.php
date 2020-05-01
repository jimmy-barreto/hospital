<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cedula')->unsigned();
            $table->string('nombre');
            $table->string('direccion');
            $table->date('fechaNacimiento');
            $table->enum("genero", ["Femenino", "Masculino"]);
            $table->integer('numeroRegistro')->unsigned();
            $table->string('numeroCama');

            $table->bigInteger('idsala')->unsigned();
            $table->foreign('idsala')->references('id')->on('salas');

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
        Schema::dropIfExists('pacientes');
    }
}
