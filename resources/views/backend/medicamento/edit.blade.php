@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar Medicamento</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('medicamentos.update', $medicamentos->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $medicamentos->nombre }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="detalles">Detalles</label>
                                    <textarea class="form-control" id="detalles" name="detalles" rows="4">{{ $medicamentos->detalles }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ $medicamentos->fecha_vencimiento }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="lote">Lote</label>
                                    <input type="text" class="form-control" id="lote" name="lote" value="{{ $medicamentos->lote }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $medicamentos->slug }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="registro_invima">Registro Invima</label>
                                    <input type="text" class="form-control" id="registro_invima" name="registro_invima" value="{{ $medicamentos->registro_invima }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                    <img src="{{ asset('images/' . $medicamentos->imagen) }}" class="img-fluid mt-2" style="max-width: 200px;" alt="Medicamento Imagen">
                                </div>
                                <div class="form-group">
                                    <label for="status">Estado</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active" @if ($medicamentos->status == 'active') selected @endif>Activo</option>
                                        <option value="inactive" @if ($medicamentos->status == 'inactive') selected @endif>Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $medicamentos->cantidad }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $medicamentos->precio }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cat_id">Category <span class="text-danger">*</span></label>
                                <select name="cat_id" id="cat_id" class="form-control">
                                    <option value="">--Select any category--</option>
                                    @foreach($categories as $key=>$cat_data)
                                        <option value='{{$cat_data->id}}' {{(($medicamentos->cat_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->title}}</option>
                                    @endforeach
                                </select>
                              </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('medicamento.index') }}" class="btn btn-default">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
