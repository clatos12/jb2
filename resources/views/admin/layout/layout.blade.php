<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('img/logos/COLORJB.ico') }}" type="image/x-icon">
    <title>JB Tecnipack | Admin</title>

    <!-- Estilos esenciales -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/select2/css/select2.min.css') }}">

    <style>
        /* Sidebar */
        .main-sidebar {
            background-color: #006976 !important;
            min-height: 100vh;
        }

        .sidebar .nav-link,
        .sidebar .nav-icon {
            color: #ffffff !important;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #065b62 !important;
            color: #ffffff !important;
        }

        /* Contenido ajustable */
        .content-wrapper {
            transition: margin-left 0.3s ease;
        }

        .main-sidebar.sidebar-collapse ~ .content-wrapper {
            margin-left: 80px;
        }

        .main-sidebar.sidebar-expanded ~ .content-wrapper {
            margin-left: 250px;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            color: #006976;
            text-align: center;
            padding: 10px 0;
            transition: bottom 0.3s ease;
            z-index: 9999;
            display: none;  /* Inicialmente oculto */
        }

        .footer.show {
            display: block; /* Mostrar el footer solo al final */
        }

        /* Estilos mejorados para la tabla */
        .table-responsive {
            overflow-x: auto;
        }

        .table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .table td, .table th {
            white-space: nowrap;
        }

        /* Estilos personalizados para la paginación */
        .pagination {
            display: flex;
            justify-content: flex-end;
            padding: 5px 0;
            margin-top: 20px;
            margin-right: 20px;
        }

        .pagination .page-item {
            margin: 0 8px;
        }

        .pagination .page-link {
            padding: 8px 16px;
            border-radius: 5px;
            color: #006976;
            border: 1px solid #006976;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #065b62;
            color: #ffffff;
            border-color: #065b62;
        }

        .pagination .page-item.active .page-link {
            background-color: #006976;
            color: #ffffff;
            border-color: #006976;
        }

        .pagination .page-item.disabled .page-link {
            color: #ccc;
            border-color: #ccc;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')
        <div class="content-wrapper">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h2>Lista de Productos</h2>
                        <!-- Botón de crear producto alineado a la derecha -->
                        <a href="{{ route('productos.create') }}" class="btn btn-success ml-auto">Crear Producto</a>
                    </div>
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
                                    <option value="ceras_cerasESD" {{ request('categoria') == 'ceras_cerasESD' ? 'selected' : '' }}>Ceras - CerasESD</option>
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
                    </div>

                    <!-- Paginación personalizada -->
                    <div class="pagination">
                        {{ $productos->links('pagination::custom') }}
                    </div>
                    <h2> </h2>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.footer')

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>
    <script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Mostrar el footer solo cuando se haga scroll hasta el final
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    $(".footer").addClass("show"); // Mostrar el footer al final
                } else {
                    $(".footer").removeClass("show"); // Ocultar el footer
                }
            });
            $('.select2').select2();
        });
    </script>

</body>

</html>
