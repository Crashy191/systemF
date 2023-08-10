@extends('backend.layouts.master')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Agregar Pedido</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pedidos.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputMedicamento">Seleccione el medicamento</label>
                            <select id="inputMedicamento" name="medicamento_id" class="form-control">
                                @foreach($medicamentos as $medicamento)
                                    <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputMedicamento">Nombre del medicamento</label>
                            <select id="inputMedicamento" name="nombre_medicamento" class="form-control">
                                @foreach($medicamentos as $medicamento)
                                    <option value="{{ $medicamento->nombre}}">{{ $medicamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputCantidad">Cantidad</label>
                            <input type="number" id="inputCantidad" name="cantidad" value="{{ old('cantidad') }}" class="form-control">
                        </div>
                        <!-- Puedes agregar más campos relacionados con el pedido aquí -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Aquí puedes mostrar detalles adicionales del medicamento seleccionado, si lo deseas -->
            <!-- Por ejemplo, detalles, fecha de vencimiento, precio, etc. -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar Pedido</button>
            <a href="#" class="btn btn-secondary">Cancelar</a>
            <!-- Otra opción sería agregar un botón para volver a la lista de medicamentos -->
            <!-- <a href="" class="btn btn-secondary">Volver</a> -->
        </div>
    </div>
</section>
@endsection
