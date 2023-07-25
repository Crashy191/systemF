@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->


            <div class="row">
                <div class="col-lg-12">
                    @include('backend/layouts/notificacion')
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabla de medicamentos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Detalles</th>
                                        <th>Fecha de Vencimiento</th>
                                        <th>Lote</th>
                                        <th>Slug</th>
                                        <th>Registro invima</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medicamentos as $medicamento)
                                    <tr>
                                        <td>{{ $medicamento->id }}</td>
                                        <td>{{ $medicamento->nombre }}</td>
                                        <td>{{ $medicamento->detalles }}</td>
                                        <td>{{ $medicamento->fecha_vencimiento }}</td>
                                        <td>{{ $medicamento->lote }}</td>
                                        <td>{{ $medicamento->slug }}</td>
                                        <td>{{ $medicamento->registro_invima }}</td>
                                        <td>
                                            @if($medicamento->imagen)
                                                <img src="{{ asset('images/' . $medicamento->imagen) }}" class="img-fluid zoom" style="max-width:80px" alt="Medicamento Imagen">
                                            @else
                                                <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                                            @endif
                                        </td>
                                        <td>
                                            @if($medicamento->status=='active')
                                                <span class="badge badge-success">{{ $medicamento->status }}</span>
                                            @else
                                                <span class="badge badge-warning">{{ $medicamento->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $medicamento->cantidad }}</td>
                                        <td>{{ $medicamento->precio }}</td>
                                        <td>
                                            <a href="{{route('medicamento.edit', $medicamento->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('medicamento.destroy', $medicamento->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este medicamento?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Detalles</th>
                                        <th>Fecha de Vencimiento</th>
                                        <th>Lote</th>
                                        <th>Slug</th>
                                        <th>Registro invima</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
