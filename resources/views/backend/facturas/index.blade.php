@extends('backend.layouts.master')
@section('content')
@vite("resources/js/app.js")
@include('backend/layouts/notificacion')
   <!-- <div class="row mx-2">
        <div class="col-8 text-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Medicamentos</h3>
                </div>
               
                <div class="card-body">

                    <div class="row">
                        @foreach ($medicamentos as $medicamento)
                            <div class="col-3 mx-4" >
                                <div class="card " style="height: 17rem;">
                                    @if ($medicamento->imagen)
                                        <img src="{{ asset('images/' . $medicamento->imagen) }}" class="img-fluid zoom"
                                            style="max-width:100%" alt="Medicamento Imagen">
                                    @else
                                        <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid zoom"
                                            style="max-width:100%" alt="avatar.png">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="card-title ">{{$medicamento->nombre}}</h6>
                                        <br>
                                        <p class="card-text text-left">Cantidad: {{$medicamento->cantidad}}</p>
                                        <a href="#" class="btn btn-outline-success justify-content-end"> <i class="far fa-plus-square"></i> Añadir</a>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>



        <div class="col-4 text-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Compra</h3>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
        -->
   <!-- <div id="carrito-container"></div>-->
   <div id="react-container" data-base-url="{{ url('/') }}" ></div>
    </section>
    
    </div>
@endsection
