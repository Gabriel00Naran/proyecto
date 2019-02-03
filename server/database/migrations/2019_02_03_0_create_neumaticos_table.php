<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeumaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('neumaticos', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->double('Ancho',20)->nullable($value = true);
          $table->double('Carga',20)->nullable($value = true);
          $table->double('velocidad',20)->nullable($value = true);
          $table->double('Ring',20)->nullable($value = true);
          $table->double('Perfil',20)->nullable($value = true);
          $table->string('TipoNeumatico',255)->nullable($value = true);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('neumaticos');
    }
}