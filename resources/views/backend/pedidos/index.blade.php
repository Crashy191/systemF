@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Pedido</h3><br>

        </div>
        <!-- /.

        card-header -->

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pedido ID</th>
                        <th>Correo Electronico</th>
                        <th>Telefono</th>

                        <th>Nombre del Cliente</th>
                        <th>Dirección de Envío</th>
                        <th>Productos</th>
                        <th>Estado</th>
                        <th>Estado de Pago</th>
                        <th>Referencia</th>
                        <th>Total</th>
                        <th>Fecha de Venta</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->email }}</td>

                            <td>{{ $pedido->telefono }}</td>

                            <td>{{ $pedido->nombre }}</td>
                            <td>{{ $pedido->direccion }}</td>
                            <td>{{ $pedido->productos }}</td>
                            <td>{{ $pedido->status }}</td>
                            <td>{{ $pedido->paid_status }}</td>
                            <td>{{ $pedido->paid_id }}</td>
                            <td>{{ $pedido->total }}</td>
                            <td>{{ $pedido->created_at }}</td>
                            <td>

                                @if ($pedido->paid_status == 'approved')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este pedido?')"
                                        disabled>Eliminar</button>
                                    <!-- Botón para abrir el modal -->
                                    <button type="button" class="btn btn-primary btn-sm my-1" data-toggle="modal"
                                        data-target="#editarEstadoPedidoModal{{ $pedido->id }}">
                                        Editar Estado
                                    </button>
                                @else
                                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                                    </form>
                                @endif

                                <!-- Agregar este código donde desees mostrar el modal -->
                                <div class="modal fade" id="editarEstadoPedidoModal{{ $pedido->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editarEstadoPedidoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editarEstadoPedidoModalLabel">Editar Estado del Pedido</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Agregar aquí los campos para editar el estado del pedido -->
                                                <!-- Por ejemplo, un select para seleccionar el nuevo estado -->
                                                <form action="{{ route('update-status', $pedido->id) }}" method="POST">
                                                    @csrf
                                                    
                                                    <div class="form-group">
                                                        <label for="nuevoEstado">Nuevo Estado:</label>
                                                        <select name="nuevoEstado" id="nuevoEstado" class="form-control">
                                                            <option value="En Proceso">En Proceso</option>
                                                            <option value="Finalizado">Finalizado</option>
                                                        </select>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin del modal -->

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
<!-- Agregar este código donde desees mostrar el modal -->
