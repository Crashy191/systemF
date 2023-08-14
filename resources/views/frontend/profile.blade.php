@extends('frontend.layouts.master')

@section('content')
<div class="col-lg-12">
    @include('backend/layouts/notificacion')
</div>
    @auth
    <div class="row py-5 my-5 mx-4">
        <div class="col-md-6 d-flex justify-content-center align-items-center border-right ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre Completo: {{ Auth()->user()->name }}</h5>
                    <p class="card-text">Correo Electronico: {{ Auth()->user()->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5>Opciones:</h5>
            <ul class="list-group">
                <button class="btn color-s"><li onclick="showMenu('perfil')">Ver Pedidos</li></button>
                <button class="btn color-s"><li onclick="showMenu('password')">Cambiar Contraseña</li></button>
                <button class="btn color-s"><li onclick="showMenu('config')">Configurar Cuenta</li></button>
                <button class="btn color-s"><li onclick="showMenu('logout')">Cerrar Sesión</li></button>
            </ul>
        </div>
    </div>
    

        <div class="row">
            <div class="col p-3  d-flex justify-content-center">


                <div id="perfilMenu" style="display: none;">
                   
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tus Pedidos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>Dirección de Envío</th>
                                        <th>Productos</th>
                                        <th>Estado</th>
                                        <th>Total</th>
                                        <th>Fecha de Compra</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedidos as $pedido)
                                        <tr>
                                           
                                            <td>{{ $pedido->direccion }}</td>
                                            <td>{{ $pedido->productos }}</td>
                                            <td>{{ $pedido->status }}</td>
                                            <td>{{ $pedido->total }}</td>
                                            <td>{{ $pedido->created_at }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="passwordMenu" style="display: none;">
                   <!-- <h6>Cambiar Contraseña</h6>
                    <form>
                         Formulario para cambiar contraseña 
                    </form>-->
                </div>

                <div id="configMenu" style="display: none;">
                    <h6>Perfil del Usuario</h6>
                    <p>Nombre: {{ Auth()->user()->name }}</p>
                    <p>Correo electrónico: {{ Auth()->user()->email }}</p>
                   <!--   <h6>Configurar Cuenta</h6>
                    <form>
                       
                    </form>-->
                </div>

                <div id="logoutMenu" style="display: none;" >
                    <h4 class="d-flex justify-content-center">Cerrar Sesión</h4>
                    <p>¿Estás seguro de que deseas cerrar sesión?</p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex justify-content-center">
                        @csrf
                        <button type="submit" class="btn btn-danger my-2">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function showMenu(menuId) {
                // Ocultar todos los menús
                document.getElementById('perfilMenu').style.display = 'none';
                document.getElementById('passwordMenu').style.display = 'none';
                document.getElementById('configMenu').style.display = 'none';
                document.getElementById('logoutMenu').style.display = 'none';

                // Mostrar el menú seleccionado
                document.getElementById(menuId + 'Menu').style.display = 'block';
            }
        </script>
    @endauth
@endsection
