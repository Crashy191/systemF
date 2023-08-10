@extends('backend.layouts.master')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Ventas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Productos</th>
                        <th>Total</th>
                        <th>Fecha de Venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->productos }}</td>
                            <td>{{ $venta->total }}</td>
                            <td>{{ $venta->created_at }}</td>

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
