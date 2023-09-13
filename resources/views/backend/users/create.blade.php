@extends('backend.layouts.master')
@section('content')

<div class="card">
    <h5 class="card-header">Agregar Usuarios</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Nombre</label>
            <input id="inputTitle" type="text" name="name" placeholder="Ingrese el nombre" value="{{old('name')}}" class="form-control">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Correo Electrónico</label>
            <input id="inputEmail" type="email" name="email" placeholder="Ingrese el correo electrónico" value="{{old('email')}}" class="form-control">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Contraseña</label>
            <input id="inputPassword" type="password" name="password" placeholder="Ingrese la contraseña" value="{{old('password')}}" class="form-control">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputPhone" class="col-form-label">Teléfono</label>
            <input id="inputPhone" type="text" name="phone" placeholder="Ingrese el teléfono" value="{{old('phone')}}" class="form-control">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress" class="col-form-label">Dirección</label>
            <input id="inputAddress" type="text" name="address" placeholder="Ingrese la dirección" value="{{old('address')}}" class="form-control">
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status" class="col-form-label">Estado</label>
            <select name="status" class="form-control">
                <option value="active">Activo</option>
                <option value="inactive">Inactivo</option>
            </select>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('backend/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#inputDetalles').summernote({
            placeholder: "Escriba una breve descripción...",
            tabsize: 2,
            height: 150
        });
    });
</script>
@endpush

