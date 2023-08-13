<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Funcion para crear la tabla en la base de datos
    public function up()
    {
        Schema::connection('mongodb')->create('accountings', function (Blueprint $table) {
            $table->id('_id');
            $table->foreignId('user_id')->constrained('users','id');
            $table->string('userName');
            $table->dateTime('inicioSesion');
            $table->dateTime('finSesion');
        });
    }

    // Funcion para eliminar la tabla si se hace un rollback
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('accountings');
    }
};
