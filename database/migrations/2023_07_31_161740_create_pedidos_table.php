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
            $table->unsignedBigInteger('medicamento_id');
            $table->string('nombre_medicamento');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
            $table->foreign('nombre_medicamento')->references('nombre')->on('medicamentos');

            $table->date('fecha_venta')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
