<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Citas extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {            
            $table->increments('id_citas');
            $table->string('nombre',50);
            $table->date('fecha');
            $table->time('hora');
            $table->text('categoria',100);
            $table->text('asunto',100);
            }); 
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
