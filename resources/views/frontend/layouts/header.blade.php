<!-- Encabezado -->

<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('frontend/img/logo.jpg') }}" alt="logo" class="logo-img">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">Acerca de</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('medicine') }}">Medicamentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                            </li>
                            <li class="nav-item dropdown">
                                @auth
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth()->user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Perfil
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Cambiar contraseña
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Configurar cuenta
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            {{ __('Cerrar sesión') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endauth
                                @guest
                                    <a class="btn btn-sm color-e" href="{{ route('login') }}">Para iniciar a comprar,
                                        inicia sesion</a>

                                @endguest

                            </li>
                            @auth
                                <li class="nav-item active">
                                    <div id="carrito" class="dropdown">
                                        <button class="btn color-s dropdown-toggle" type="button" id="carritoDropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-shopping-cart"> <span id="cartBadge" class="cart-badge">0</span></i> Mi Carrito
                                        </button>
                                        <div id="carritoDrop" class="dropdown-menu carritos"
                                            aria-labelledby="carritoDropdown">
                                            <div class="card mt-4">
                                                <div class="card-header d-flex justify-content-center">
                                                    Carrito de Compras
                                                </div>
                                                <div class="card-body ">
                                                    <div id="carritoContent"></div>
                                                    <hr>
                                                    <div class="col d-flex justify-content-center">
                                                        <div id="totalCarrito" class=""></div>
                                                    </div>


                                                    <div class="col d-flex justify-content-center"><button
                                                            class="btn my-1 btn-danger btn-vaciar-carrito"><i
                                                                class="fas fa-trash"></i> Vaciar Carrito</button></div>
                                                    <div class="col d-flex justify-content-center"> <button
                                                            class="btn my-1 btn-success btn-confirmar-pedido "
                                                            data-bs-toggle="modal" data-bs-target="#confirmarPedidoModal"><i
                                                                class="fas fa-check-circle"></i> Confirmar Pedido</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endauth
                            @guest


                            @endguest
                        </ul>
                    </div>
                    
                </nav>
            </div>
        </div>
    </div>
</header>



<style>
    .logo-img {
        max-width: 300px;
        /* Ajusta el tamaño del logo según tus preferencias */
        margin-right: 20px;
        /* Espacio entre el logo y el menú */
    }

    .carritos {
        width: 42vh;
        /* Ajusta el ancho de la tarjeta según tus preferencias */
    }
    .cart-badge {
    position: absolute;
    top: 0;
    
    left: 15%;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 4px 6px;
    font-size: 12px;
    font-weight: bold;
}
</style>
<!-- Agrega este formulario en tu HTML -->

<!-- Botón para abrir el modal -->
<!-- Button trigger modal -->

@auth
    <!-- Modal para confirmar el pedido -->
    <div class="modal fade" id="confirmarPedidoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">

            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pedidoForm" action="/confirmar-pedido" method="POST">
                        <div class="row">
                            <div class="col-5 border-right">
                                <div class="mb-3">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value=" {{ Auth()->user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre">Correo:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value=" {{ Auth()->user()->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nombre">Telefono:</label>
                                    <input type="number" class="form-control" id="tetlefono" name="tetlefono" required>
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Direccion:</label>
                                    <textarea class="form-control" id="direccion" name="direccion" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="informacion-adicional" class="form-label">Información Adicional:</label>
                                    <textarea class="form-control" id="informacion-adicional" name="informacion_adicional" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-7">
                                <h4>Productos en el Carrito:</h4>
                                <ul id="listaProductosCarrito"></ul>
                                <div class="col d-flex justify-content-center">
                                    <div id="totalCarritoS" class=""></div>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" name="carrito" id="carritoInput">



                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="enviarPedidoBtn">Enviar Pedido</button>
                    </div>
                    </form>
                
            </div>
        </div>
    </div>
@endauth
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="{{ asset('frontend/js/carrito.js') }}"></script>
