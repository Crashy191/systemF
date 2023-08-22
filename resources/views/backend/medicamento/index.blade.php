@extends('backend.layouts.master')
@section('content')

<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notificacion')
        </div>
    </div>
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary float-left">Tabla de medicamentos</h6>
     <form action="{{ route('filtrar') }}" method="POST" class="form-inline float-right">
         @csrf
         <div class="form-group ml-2">
             <label class="mr-2">Categoría:</label>
             <select name="categoria" class="form-control">
                 <option value="">Todas</option>
                 @foreach($categories as $key => $cat_data)
                     <option value="{{ $cat_data->id }}">{{ $cat_data->title }}</option>
                 @endforeach
             </select>
         </div>
         <button type="submit" class="btn btn-primary ml-2">Filtrar</button>
     </form>
   </div>
   <div class="card-body">
     <div class="table-responsive">
       <table id="example2" class="table table-bordered table-hover" style="width: 100%;">
         <thead>
           <tr>
             <th>Id</th>
             <th>Nombre</th>
             <th>Detalles</th>
             <th>Fecha de Vencimiento</th>
             <th>Lote</th>
             <th>Categoría</th>
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
               <td>{{ @$medicamento->cat_info['title'] }}</td>
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
                   <span class="badge {{ $medicamento->status == 'active' ? 'badge-success' : 'badge-warning' }}">{{ $medicamento->status }}</span>
               </td>
               <td>{{ $medicamento->cantidad }}</td>
               <td>{{ $medicamento->precio }}</td>
               <td>
                   <a href="{{ route('medicamento.edit', $medicamento->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                   <form action="{{ route('medicamento.destroy', $medicamento->id) }}" method="post" style="display: inline-block">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este medicamento?')"><i class="fas fa-trash-alt"></i></button>
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
             <th>Categoría</th>
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
       @if(count($medicamentos) === 0)
           <h6 class="text-center">No se encontraron medicamentos.</h6>
       @endif
     </div>
   </div>
</div>
@endsection

@push('styles')
 <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
 <style>
     div.dataTables_wrapper div.dataTables_paginate{
         display: none;
     }
     .table {
         margin: 0; /* Reset default table margin */
     }
 </style>
@endpush

@push('scripts')

 <!-- Page level plugins -->
 <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
 <script>
     $('#example2').DataTable({
         "columnDefs": [
             {
                 "orderable": false,
                 "targets": [12]
             }
         ],
         "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
         }
     });

     $('.dltBtn').click(function (e) {
         var form = $(this).closest('form');
         var dataID = $(this).data('id');
         e.preventDefault();
         swal({
             title: "¿Estás seguro?",
             text: "Una vez eliminado, no podrás recuperar estos datos.",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         }).then((willDelete) => {
             if (willDelete) {
                 form.submit();
             } else {
                 swal("Los datos están seguros.");
             }
         });
     });
 </script>
@endpush

