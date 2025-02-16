@extends('adminlte::page')

@section('title', 'Productos')

<link rel="icon" type="image/x-icon" href="{{ asset('img/logos/COLORJB.ico') }}" />

@section('content')
    <style>
        /* Barra lateral con color principal */
        .main-sidebar {
            background-color: #006976 !important; /* Color principal */
            min-height: 100vh; /* Aseguramos que el sidebar ocupe toda la altura de la pantalla */
        }

        /* Enlaces en la barra lateral */
        .sidebar .nav-link {
            color: #ffffff !important; /* Texto blanco */
        }

        /* Color de los enlaces al pasar el mouse */
        .sidebar .nav-link:hover {
            background-color: #065b62 !important; /* Color de fondo al pasar el mouse */
            color: #ffffff !important; /* Mantener el texto blanco */
        }

        /* Enlace seleccionado en la barra lateral */
        .sidebar .nav-link.active {
            background-color: #065b62 !important; /* Color secundario cuando se selecciona */
            color: #ffffff !important; /* Texto blanco */
        }

        /* Estilo de la barra lateral cuando está colapsada */
        .sidebar-collapse .nav-link {
            color: #ffffff !important;
        }

        /* Asegurarse de que los íconos de la barra lateral también se muestren blancos */
        .sidebar .nav-icon {
            color: #ffffff !important;
        }

        /* Paginación personalizada */
        .pagination {
            justify-content: center;
            margin-top: 20px;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%); /* Centrar las flechas en la parte inferior */
        }

        .pagination li a {
            color: #006976;
            font-size: 12px; /* Reducir aún más el tamaño de la fuente */
            padding: 3px 6px; /* Reducir el padding */
        }

        .pagination .active a {
            background-color: #006976;
            border-color: #006976;
            color: white;
        }

        /* Flechas de la paginación (ajustadas) */
        .pagination .page-item a {
            font-size: 16px; /* Flechas más pequeñas */
            padding: 0 8px; /* Reducir el tamaño de las flechas */
        }

        /* Contenedor de la tabla con scroll horizontal */
        .table-responsive {
            overflow-x: auto;
        }

        /* Limitar tamaño de las imágenes */
        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        /* Footer con estilo blanco, oculto por defecto y visible al llegar al final */
        .footer {
            position: fixed;
            bottom: -100px; /* Inicialmente fuera de la vista */
            left: 0;
            right: 0;
            background-color: white;
            color: #006976;
            text-align: center;
            padding: 10px 0;
            transition: bottom 0.3s ease; /* Transición suave */
        }

        /* Aparece cuando se hace scroll hasta el final */
        .footer.show {
            bottom: 0; /* Mostrar al final de la página */
        }

        /* Asegurar que el contenido principal no quede oculto debajo del footer */
        .content-wrapper {
            padding-bottom: 50px;
            min-height: 100vh; /* Aseguramos que el contenido ocupe todo el alto disponible */
        }

        /* Aseguramos que el contenido se ajuste al alto del sidebar */
        .content-wrapper, .main-sidebar {
            display: flex;
            flex-direction: column;
        }
    </style>

    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Lista de Productos</h2>
                <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="{{ route('productos.index') }}">
                    <div class="card p-3 mb-3">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 mb-2">
                                <label for="categoria">Categoría</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Todas</option>
                                    <option value="miscelaneos_tapetes_esd" {{ request('categoria') == 'miscelaneos_tapetes_esd' ? 'selected' : '' }}>Misceláneos - Tapetes ESD</option>
                                    <option value="miscelaneos_bolsas_esd" {{ request('categoria') == 'miscelaneos_bolsas_esd' ? 'selected' : '' }}>Misceláneos - Bolsas ESD</option>
                                    <option value="miscelaneos_bancos_esd" {{ request('categoria') == 'miscelaneos_bancos_esd' ? 'selected' : '' }}>Misceláneos - Bancos ESD</option>
                                    <option value="integraciones_mesas_trabajo" {{ request('categoria') == 'integraciones_mesas_trabajo' ? 'selected' : '' }}>Integraciones - Mesas de Trabajo</option>
                                    <option value="integraciones_carros_lean" {{ request('categoria') == 'integraciones_carros_lean' ? 'selected' : '' }}>Integraciones - Carros Lean</option>
                                    <option value="integraciones_accesorios" {{ request('categoria') == 'integraciones_accesorios' ? 'selected' : '' }}>Integraciones - Accesorios</option>
                                    <option value="divisores" {{ request('categoria') == 'divisores' ? 'selected' : '' }}>Divisores</option>
                                    <option value="charolas_termoformadas" {{ request('categoria') == 'charolas_termoformadas' ? 'selected' : '' }}>Charolas - Termoformadas</option>
                                    <option value="charolas_inyectada" {{ request('categoria') == 'charolas_inyectada' ? 'selected' : '' }}>Charolas - Inyectada</option>
                                    <option value="charolas_eva_esd" {{ request('categoria') == 'charolas_eva_esd' ? 'selected' : '' }}>Charolas - EVA ESD</option>
                                    <option value="cajas_inyectadas" {{ request('categoria') == 'cajas_inyectadas' ? 'selected' : '' }}>Cajas - Inyectadas</option>
                                    <option value="cajas_coroplast" {{ request('categoria') == 'cajas_coroplast' ? 'selected' : '' }}>Cajas - Coroplast</option>
                                    <option value="cajas_carton" {{ request('categoria') == 'cajas_carton' ? 'selected' : '' }}>Cajas - Cartón</option>
                                    <option value="bines_inyectado" {{ request('categoria') == 'bines_inyectado' ? 'selected' : '' }}>Bines - Inyectado</option>
                                    <option value="bines_corrugado" {{ request('categoria') == 'bines_corrugado' ? 'selected' : '' }}>Bines - Corrugado</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="search">Buscar por título</label>
                                <input type="text" name="search" value="{{ request('search') }}" id="search" class="form-control" placeholder="Buscar por título">
                            </div>

                            <div class="col-md-3 col-sm-12 mb-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Fotografía</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->titulo }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>
                                            @if ($producto->fotografia)
                                                <img src="{{ asset('storage/' . $producto->fotografia) }}" alt="Imagen de {{ $producto->titulo }}">
                                            @else
                                                No disponible
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('productos.toggleEstado', $producto->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')  
                                                <button type="submit" class="btn btn-sm {{ $producto->estado ? 'btn-success' : 'btn-danger' }}">
                                                    {{ $producto->estado ? 'Disponible' : 'No disponible' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Tu Empresa. Todos los derechos reservados.</p>
    </div>

@endsection

@section('js')
    <script>
        // Mostrar el footer al hacer scroll hasta el final de la página
        window.addEventListener('scroll', function() {
            const footer = document.querySelector('.footer');
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                footer.classList.add('show');
            } else {
                footer.classList.remove('show');
            }
        });
    </script>
@endsection
