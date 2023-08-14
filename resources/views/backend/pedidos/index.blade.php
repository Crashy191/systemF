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
                    <th>Correo Electronico</th>
                    <th>Telefono</th>
                    <th>Informacion</th>
                    <th>Nombre del Cliente</th>
                    <th>Dirección de Envío</th>
                    <th>Productos</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Fecha de Venta</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->email }}</td>

                        <td>{{ $pedido->telefono }}</td>
                        <td>{{ $pedido->informacion }}</td>
                        <td>{{ $pedido->nombre }}</td>
                        <td>{{ $pedido->direccion }}</td>
                        <td>{{ $pedido->productos }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td>{{ $pedido->created_at }}</td>
                        <td>
                           <!-- <a href=" //route('pedidos.edit', $pedido->id) }}" class="btn btn-primary btn-sm">Editar</a> -->
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
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
