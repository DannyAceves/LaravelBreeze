<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriasNotificaciones extends Migration
{

    public function up()
    {
        Schema::create('categorias_notificaciones', function (Blueprint $table) {            
            $table->increments('id_categoria');
            $table->text('categoria',100);
            $table->text('imagen_categoria',255);
            }); 
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_notificaciones');
    }
}
