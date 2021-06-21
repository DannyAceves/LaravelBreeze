<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Semestres extends Migration
{

    public function up()
    {        
        Schema::create('semestres', function (Blueprint $table) {            
            $table->increments('id_semestre');

            $table->integer('id_carrera')->unsigned();
            $table->foreign('id_carrera')
            ->references('id_carrera')->on('carreras');

            $table->String('n_semestres',2);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semestres');
    }
}
