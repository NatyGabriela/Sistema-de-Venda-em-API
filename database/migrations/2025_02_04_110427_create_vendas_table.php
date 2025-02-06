<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id')->nullable(false);
            $table->timestamp('data_venda')->nullable(false);
            $table->decimal('subtotal')->nullable(false);
            $table->decimal('desconto')->nullable(false);
            $table->decimal('total')->nullable(false);
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};

