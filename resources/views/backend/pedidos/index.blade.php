@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalles del Pedido</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pedido ID</th>
                    <th>Medicamento ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Fecha de venta</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                               <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->medicamento_id }}</td>
                        <td>{{ $pedido->nombre_medicamento }}</td>
                        <td>{{ $pedido->cantidad }}</td>
                        <td>{{ $pedido->precio_unitario }}</td>

                        <td>{{ $pedido->total }}</td>
                        <td>{{ $pedido->fecha_venta }}</td>
                        <td>
                            <a href="{{route('pedidos.edit', $pedido->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este medicamento?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
