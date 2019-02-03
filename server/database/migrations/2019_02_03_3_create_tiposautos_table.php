<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tiposautos', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('Tipo',0)->nullable($value = true);
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
       Schema::dropIfExists('tiposautos');
    }
}