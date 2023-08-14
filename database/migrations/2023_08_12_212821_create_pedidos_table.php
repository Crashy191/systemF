<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->nullable();

            $table->string('direccion');
            $table->integer('telefono');
            $table->string('informacion');
         
            $table->enum('status',['En Proceso','Finalizado','Cancelado'])->default('En Proceso');

            $table->string('productos');
          
            $table->decimal('total', 10, 2);
            $table->timestamps();

                 });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

