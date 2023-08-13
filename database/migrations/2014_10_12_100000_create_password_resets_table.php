<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Funcion para crear la tabla en la base de datos
    public function up()
    {
        Schema::connection('sqlsrv')->create('password_resets', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    // Funcion para eliminar la tabla si se hace un rollback
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
