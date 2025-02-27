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
            padding: 10px 0;
            margin-top: 10px;
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



            <!-- Contenido específico de cada vista -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        @yield('content') <!-- Contenido dinámico -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- 

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
-->
</body>

</html>
