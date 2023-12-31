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
                <h3 class="card-title">Tabla de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Correo de verificación</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Token</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->email_verified_at}}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->remember_token }}</td>

                            <td>
                                <a href="{{route('users.edit', $user->id) }}" class="btn btn-primary btn-sm float-left mr-1 my-2" style="height:30px; width:30px;border-radius:50%"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="height:30px; width:30px;border-radius:50%"  onclick="return confirm('¿Estás seguro de eliminar este usuario?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Correo de verificación</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Token</th>

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
