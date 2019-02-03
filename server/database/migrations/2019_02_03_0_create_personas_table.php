<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('personas', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('Nombres',255)->nullable($value = true);
          $table->string('Apellidos',255)->nullable($value = true);
          $table->string('Telefono',255)->nullable($value = true);
          $table->string('Direccion ',255)->nullable($value = true);
          $table->string('Identificacion ',255)->nullable($value = true);
          $table->string('Password',255)->nullable($value = true);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('personas');
    }
}