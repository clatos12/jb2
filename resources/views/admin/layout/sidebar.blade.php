<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">

    <!-- Brand Logo -->
    <a href="{{url('productos')}}" class="brand-link">
        <div class="brand-logo-container" style="display: flex; justify-content: center; align-items: center; padding: .5px;">
            <img id="logo-img" src="{{ asset('img/logos/BLANCO.png') }}" alt="JB Technipack Logo" 
                style="max-height: 40px; width: auto;">
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #006976;">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Sección de Productos (ahora más arriba) -->
                <?php $active = (Session::get('page') == "user-list" || Session::get('page') == "store") ? "active" : ""; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-box"></i>
                        <p style="color: #E8E1DB">Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('productos')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="color: #E8E1DB">Administrar Inventario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('productos/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="color: #E8E1DB">Crear Productos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sección de Administración -->
                <?php $active = (Session::get('page') == "dashboard" || Session::get('page') == "perfil" || Session::get('page') == "usuarios" || Session::get('page') == "usuarios/crear") ? "active" : ""; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p style="color: #E8E1DB">
                            Administración
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('usuarios')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="color: #E8E1DB">Ver Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('perfil')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="color: #E8E1DB">Ver Perfil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('usuarios/crear')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="color: #E8E1DB">Registrar Más Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <!-- Sección de Clientes -->
            <?php $active =($clientsActive = (Session::get('page') == "clientes" || Session::get('page') == "contacts")) ? "active" : "";?>
            <li class="nav-item menu-open">
            <a href="#" class="nav-link {{$clientsActive}}">
             <i class="nav-icon fas fa-users"></i>
             <p style="color: #E8E1DB">
                    Clientes
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
             <!--<li class="nav-item">
                    <a href="{{url('clientes')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p style="color: #E8E1DB">Ver Clientes</p>
                    </a>
                </li>-->
             <li class="nav-item">
                  <a href="{{url('contacts')}}" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p style="color: #E8E1DB">Solicitudes de Contactos</p>
                  </a>
             </li>
           </ul>
        </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- JavaScript para cambiar el logo cuando el sidebar se colapsa -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const logoImg = document.getElementById("logo-img");
    const body = document.body;

    function updateLogo() {
        if (body.classList.contains("sidebar-collapse")) {
            logoImg.src = "{{ asset('img/logos/BLANCOJB.png') }}"; // Logo cuando el sidebar está contraído
        } else {
            logoImg.src = "{{ asset('img/logos/BLANCO.png') }}"; // Logo original
        }
    }

    // Observa cambios en la clase del body
    const observer = new MutationObserver(updateLogo);
    observer.observe(body, { attributes: true, attributeFilter: ["class"] });

    // Llama a la función al cargar para asegurar que el logo es el correcto
    updateLogo();
});
</script>
