<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Funcion para crear la tabla en la base de datos
    public function up()
    {
        Schema::connection('sqlsrv')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profileImage')->nullable();
            $table->boolean('isAdmin')->default(false);
            $table->string('password');
            $table->boolean('estado')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    // Funcion para eliminar la tabla si se hace un rollback
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
