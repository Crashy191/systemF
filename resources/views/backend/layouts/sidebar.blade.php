<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('backend/assets/dist/img/adminF.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Administrador</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar.. " aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Facturación -->
            <li class="nav-item">
                <a href="{{ route('facturas.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>Facturación</p>

                </a>
            </li>

            <!-- Ventas -->
            <li class="nav-item">
                <a href="{{ route('ventas.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Ventas</p>
        
                </a>
            </li>

            <!-- Usuarios -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Usuarios <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Agregar Usuarios</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Medicamentos -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-medkit"></i>
                    <p>Medicamentos <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('medicamento.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Medicamentos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('medicamento.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Agregar Medicamentos</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Banners -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-image"></i>
                    <p>Banners    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('banner.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Banners</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banner.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Agregar Banners</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Categorías -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Categorías  <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Categorías</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Agregar Categorías</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pedidos -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Pedidos <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('pedidos.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listar Pedidos</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>




