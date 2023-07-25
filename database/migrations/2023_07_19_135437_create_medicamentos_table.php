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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->mediumText('detalles')->nullable();;
            $table->date('fecha_vencimiento');
            $table->string('lote');
            $table->string('slug')->unique();
            $table->string('registro_invima')->nullable();
            $table->string('imagen')->nullable();
            $table->unsignedInteger('cantidad')->default(0); 
            $table->decimal('precio', 10, 2); 
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
