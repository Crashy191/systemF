<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin') }}" class="nav-link">Inicio</a>
        </li>
     
    </ul>

    <!-- Formulario de Filtrado -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth()->user()->name}}</span>


        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


         <!--
            <a class="dropdown-item" href="">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Perfil
            </a>
            <a class="dropdown-item" href="">
              <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
              Cambiar contraseña
            </a>
            <a class="dropdown-item" href="">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
           Configurar cuenta
            </a>
            <div class="dropdown-divider"></div>
         -->
          <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Cerrar sesion') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </li>

    </ul>
  </nav>
<!-- En el footer de tu layout -->
<script>
    $(document).ready(function() {
        // Activa el colapso del menú de la barra lateral
        $('[data-widget="treeview"]').Treeview('init');

        // Controla el colapso del menú cuando se hace clic en los elementos con la clase 'nav-link'
        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            $(this).next('.nav-treeview').slideToggle();
        });
    });
</script>
