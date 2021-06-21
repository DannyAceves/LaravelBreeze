<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')
                ->references('id_tipo')->on('tipo_user');
                
            $table->string('nombre', 50);
            $table->string('a_pat', 50);
            $table->string('a_mat', 50);
            $table->string('telefono', 14);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('direccion', 255);
            $table->string('cod_postal', 5);
            $table->date('fecha_nacimiento');
            $table->text('password', 255);
            $table->text('foto', 255);
            $table->rememberToken();
            $table->timestamps();
            $table->String('matricula', 9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
