<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('autos', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('Placa',20)->nullable($value = true);
          $table->string('Matricula',20)->nullable($value = true);
          $table->dateTime('Tiempo Inicial')->nullable($value = true);
          $table->dateTime('Tiempo Final')->nullable($value = true);
          $table->unsignedInteger('idUsuario');
          $table->foreign('idUsuario')->references('id')->on('usuarios')->onDelete('cascade');
          $table->unsignedInteger('idNeumatico');
          $table->foreign('idNeumatico')->references('id')->on('neumaticos')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('autos');
    }
}