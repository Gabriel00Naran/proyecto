<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatekilometragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('kilometrages', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->double('KilometrageInicial',10)->nullable($value = true);
          $table->double('kilometrageFinal',10)->nullable($value = true);
          $table->unsignedInteger('idAuto');
          $table->foreign('idAuto')->references('id')->on('autos')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('kilometrages');
    }
}