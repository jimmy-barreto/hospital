<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdiagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdiags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');

            $table->bigInteger('idpaciente')->unsigned();
            $table->foreign('idpaciente')->references('id')->on('pacientes');

            $table->bigInteger('iddiagnostico')->unsigned();
            $table->foreign('iddiagnostico')->references('id')->on('diagnosticos');

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
        Schema::dropIfExists('vdiags');
    }
}
