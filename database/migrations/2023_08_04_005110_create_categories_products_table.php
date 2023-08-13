<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Funcion para crear la tabla en la base de datos
    public function up(): void
    {
        Schema::connection('sqlsrv')->create('categories_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->constrained('categories','id');
            $table->foreignId('products_id')->constrained('products','id');
            $table->date('registered_at')->default(now());
            $table->timestamps();
        });
    }

    // Funcion para eliminar la tabla si se hace un rollback
    public function down(): void
    {
        Schema::dropIfExists('categories_products');
    }
};
