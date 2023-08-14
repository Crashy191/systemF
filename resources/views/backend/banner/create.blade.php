@extends('backend.layouts.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Banners</h3>
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
                        <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                            @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputImagen">Imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputImagen" name="image_path">
                                    <label class="custom-file-label" for="inputImagen">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancelar</a>
                <!-- Otra opción sería agregar un botón para volver a la lista de medicamentos -->
                <!-- <a href="" class="btn btn-secondary">Volver</a> -->
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{asset('backend/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#inputDetalles').summernote({
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 150
        });
    });
</script>
@endpush

