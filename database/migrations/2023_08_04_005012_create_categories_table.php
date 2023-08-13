<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Funcion para crear la tabla en la base de datos
    public function up(): void
    {
        Schema::connection('sqlsrv')->create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    // Funcion para eliminar la tabla si se hace un rollback
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
