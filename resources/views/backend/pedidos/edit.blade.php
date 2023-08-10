@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Pedido</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="{{ route('pedidos.update', $pedidos->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="medicamento_id">Medicamento ID</label>
                <input type="text" class="form-control" id="medicamento_id" name="medicamento_id" value="{{ $pedidos->medicamento_id }}" readonly>
            </div>
            <div class="form-group">
                <label for="nombre_medicamento">Nombre del Medicamento</label>
                <input type="text" class="form-control" id="nombre_medicamento" name="nombre_medicamento" value="{{ $pedidos->nombre_medicamento }}" readonly>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $pedidos->cantidad }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pedidos.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
