@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <h5 class="card-header">Editar Categoría</h5>
        <div class="card-body">
            <form method="post" action="{{ route('categories.update', $category->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Título <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Ingrese el título"
                        value="{{ $category->title }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="summary" class="col-form-label">Resumen</label>
                    <textarea class="form-control" id="summary" name="summary">{{ $category->summary }}</textarea>
                    @error('summary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="status" class="col-form-label">Estado <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Activa</option>
                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactiva
                        </option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Actualizar</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script>
      
        $(document).ready(function() {
          $('#summary').summernote({
            placeholder: "Escribe una breve descripción...",
            tabsize: 2,
            height: 150
        });
        });
    </script>
    <script>
      $('#is_parent').change(function(){
        var is_checked = $('#is_parent').prop('checked');
        if(is_checked){
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val('');
        }
        else{
            $('#parent_cat_div').removeClass('d-none');
        }
    })
    </script>
@endpush
