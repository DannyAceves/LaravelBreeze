<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contacto extends Migration
{

    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {            
            $table->increments('id_contacto');
            $table->string('nombre',50);
            $table->text('asunto',100);
            $table->text('mensaje',255);
            $table->text('email',100);
        });         
    }
    
    public function down()
    {
        Schema::drop('contacto');
    }
}
