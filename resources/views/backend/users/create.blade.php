@extends('backend.layouts.master')
@section('content')

<div class="card">
    <h5 class="card-header">Agregar Usuarios</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nombre</label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{old('name')}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Contraseña</label>
          <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{old('password')}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>



          <div class="form-group">
            <label for="status" class="col-form-label">Estado</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
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
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 150
        });
    });
</script>
@endpush
