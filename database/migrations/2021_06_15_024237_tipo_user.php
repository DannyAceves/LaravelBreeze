<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoUser extends Migration
{

    public function up()
    {
        Schema::create('tipo_user', function (Blueprint $table) {            
            $table->increments('id_tipo');
            $table->string('tipo',50);
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_user');
    }
}
