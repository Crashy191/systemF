@extends('frontend.layouts.master')

@section('content')
<section class="section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Realizar Pedido</h2>

                        <!-- Comienza el bucle para mostrar los medicamentos -->
                        @foreach ($medicamentos as $medicamento)
                        <form action="{{ route('pedidos.store') }}" method="POST">
                            @csrf
                            @method('POST') <!-- Cambiado a 'POST' ya que estás creando un nuevo pedido -->

                            <!-- Campos ocultos para almacenar los datos del medicamento -->
                            <input type="hidden" name="medicamento_id" value="{{ $medicamento->id }}">
                            <input type="hidden" name="nombre_medicamento" value="{{ $medicamento->nombre }}">
                            <input type="hidden" name="precio_medicamento" value="{{ $medicamento->precio }}">

                            <div class="form-group">
                                <label for="nombre">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección de Envío</label>
                                <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad Deseada</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                            </div>

                            <div class="form-group">
                                <label for="total">Total del Pedido:</label>
                                <!-- Agrega aquí el cálculo para mostrar el total del pedido -->
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Confirmar Pedido</button>
                        </form>
                        @endforeach
                        <!-- Finaliza el bucle -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
