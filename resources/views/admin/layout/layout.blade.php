<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags y otros enlaces de recursos -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('img/logos/COLORJB.ico') }}" type="image/x-icon">
    <title>JB Tecnipack | Admin </title>

    <!-- Fuentes y CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/select2/css/select2.min.css') }}">

    <style>
        /* Estilos personalizados desde tu index */
        .main-sidebar {
            background-color: #006976 !important;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #ffffff !important;
        }

        .sidebar .nav-link:hover {
            background-color: #065b62 !important;
            color: #ffffff !important;
        }

        .sidebar .nav-link.active {
            background-color: #065b62 !important;
            color: #ffffff !important;
        }

        .sidebar-collapse .nav-link {
            color: #ffffff !important;
        }

        .sidebar .nav-icon {
            color: #ffffff !important;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .pagination li a {
            color: #006976;
            font-size: 12px;
            padding: 3px 6px;
        }

        .pagination .active a {
            background-color: #006976;
            border-color: #006976;
            color: white;
        }

        .pagination .page-item a {
            font-size: 16px;
            padding: 0 8px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .footer {
            position: fixed;
            bottom: -100px;
            left: 0;
            right: 0;
            background-color: white;
            color: #006976;
            text-align: center;
            padding: 10px 0;
            transition: bottom 0.3s ease;
        }

        .footer.show {
            bottom: 0;
        }

        .content-wrapper {
            padding-bottom: 50px;
            min-height: 100vh;
            transition: margin-left 0.3s ease; /* Para hacer que el margen cambie suavemente */
        }

        .content-wrapper, .main-sidebar {
            display: flex;
            flex-direction: column;
        }

        .page-item.active .page-link {
            background-color: #006976 !important;
            border-color: #065b62 !important;
            color: white !important;
        }

        /* Ajustes de márgenes cuando el sidebar está colapsado */
        .sidebar-collapse ~ .content-wrapper {
            margin-left: 80px; /* Sidebar colapsado */
        }

        /* Ajustes de márgenes cuando el sidebar está expandido */
        .sidebar-expanded ~ .content-wrapper {
            margin-left: 250px; /* Sidebar expandido */
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.layout.header')
    @include('admin.layout.sidebar')

    @yield('content')

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Aquí va contenido opcional -->
    </aside>

</div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/adminlte.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<script src="{{ asset('admin/js/custom2.js') }}"></script>
<script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('.select2').select2();

    // Detectamos el cambio en el estado del sidebar (expandido o colapsado)
    $(document).on('expanded.lte.sidebar', function () {
        // Cuando el sidebar se expande, cambiamos la clase y el margen
        $('body').removeClass('sidebar-collapse').addClass('sidebar-expanded');
    });

    $(document).on('collapsed.lte.sidebar', function () {
        // Cuando el sidebar se colapsa, cambiamos la clase y el margen
        $('body').removeClass('sidebar-expanded').addClass('sidebar-collapse');
    });

    // Aseguramos que el contenido se adapte correctamente al cargar la página
    $(document).ready(function () {
        if ($('.main-sidebar').hasClass('sidebar-collapse')) {
            $('body').addClass('sidebar-collapse');
        } else {
            $('body').addClass('sidebar-expanded');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script>
    $(function () {
        $("#userlist").DataTable();
        $("#userlist1").DataTable();
    });
</script>

</body>

</html>
