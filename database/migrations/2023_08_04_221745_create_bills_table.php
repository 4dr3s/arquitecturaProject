<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->decimal('totalPrice');
            $table->date('dateOrder')->default(now());
            $table->foreignId('user_id')->constrained('users','id')->nullable();
            $table->foreignId('product_id')->constrained('products','id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('bills');
    }
};
