<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comentarios extends Migration
{

    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {            
            $table->increments('id_comentario');

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')
            ->references('id')->on('users');

            $table->text('comentario',255);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cometarios');
    }
}
