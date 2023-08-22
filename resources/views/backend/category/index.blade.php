@extends('backend.layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
               @include('backend.layouts.notificacion')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Listado de Categorías</h6>
            <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Agregar Categoría"><i class="fas fa-plus"></i> Agregar Categoría</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
               @if(count($categories) > 0)
               <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                 <thead>
                   <tr>
                     <th>Título</th>
                     <th>Resumen</th>
                     <th>Estado</th>
                     <th>Acción</th>
                   </tr>
                 </thead>
                 <tfoot>
                   <tr>
                    <th>Título</th>
                    <th>Resumen</th>
                    <th>Estado</th>
                    <th>Acción</th>
                   </tr>
                 </tfoot>
                 <tbody>
                   @foreach($categories as $category)
                     <tr>
                         <td>{{$category->id}}</td>
                         <td>{{$category->title}}</td>
                         <td>{{$category->summary}}</td>
                         <td>
                             @if($category->status=='active')
                                 <span class="badge badge-success">Activa</span>
                             @else
                                 <span class="badge badge-warning">Inactiva</span>
                             @endif
                         </td>
                         <td>
                             <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="editar" data-placement="bottom"><i class="fas fa-edit"></i></a>
                             <form method="POST" action="{{route('categories.destroy',[$category->id])}}">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-danger btn-sm dltBtn" data-id={{$category->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                             </form>
                         </td>
                     </tr>
                   @endforeach
                 </tbody>
               </table>
               @else
               <h6 class="text-center">¡No se encontraron categorías! Por favor, crea una categoría</h6>
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
 </style>
@endpush

@push('scripts')
 <!-- Plugins de nivel de página -->
 <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

 <!-- Scripts personalizados de nivel de página -->
 <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
 <script>

     $('#banner-dataTable').DataTable( {
           "columnDefs":[
               {
                   "orderable":false,
                   "targets":[3,4,5]
               }
           ]
       } );

       // Alerta dulce

       function deleteData(id){

       }
 </script>
 <script>
     $(document).ready(function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
         $('.dltBtn').click(function(e){
           var form=$(this).closest('form');
             var dataID=$(this).data('id');
             e.preventDefault();
             swal({
                   title: "¿Estás seguro?",
                   text: "Una vez eliminados, no podrás recuperar estos datos.",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
               })
               .then((willDelete) => {
                   if (willDelete) {
                      form.submit();
                   } else {
                       swal("¡Tus datos están seguros!");
                   }
               });
         })
     })
 </script>
@endpush