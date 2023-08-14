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
                                        <th>Imagen</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->id }}</td>

                                        <td>
                                            @if($banner->image_path)
                                                <img src="{{ asset('images/banners' . $banner->image_path) }}" class="img-fluid zoom" style="max-width:100%" alt="">
                                            @else
                                                <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{route('banner.edit', $banner->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="post" style="display: inline-block">
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

                                        <th>Imagen</th>

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
