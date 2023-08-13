<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Funcion para crear la tabla en la base de datos
    public function up(): void
    {
        Schema::connection('sqlsrv')->create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description',300)->nullable();
            $table->integer('stock');
            $table->boolean('estado')->default(true);
            $table->decimal('unitPrice');
            $table->string('productImage')->nullable();
            $table->timestamps();
        });
    }

    // Funcion para eliminar la tabla si se hace un rollback
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
