<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('usuarios', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('NombreWeb',255)->nullable($value = true);
          $table->unsignedInteger('idPersona');
          $table->foreign('idPersona')->references('id')->on('personas')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('usuarios');
    }
}