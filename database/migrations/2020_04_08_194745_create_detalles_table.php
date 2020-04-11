<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->date('fecha');

            $table->bigInteger('idhospital')->unsigned();
            $table->foreign('idhospital')->references('id')->on('hospitals');

            $table->bigInteger('idlaboratorio')->unsigned();
            $table->foreign('idlaboratorio')->references('id')->on('laboratorios');

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
        Schema::dropIfExists('detalles');
    }
}
