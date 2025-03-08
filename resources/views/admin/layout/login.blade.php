<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logos/COLORJB.ico') }}" type="image/x-icon">
    <title>Jb Technipack | Admin</title>

    <!-- Estilos esenciales -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/select2/css/select2.min.css') }}">

    <style>
        /* Personalización de la página de login */
        body {
            background-color: #006976;
            font-family: 'Source Sans Pro', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-logo a {
            display: block;
            margin-bottom: 20px;
        }

        .login-logo img {
            width: 180px;
            height: auto;
        }

        .form-control {
            border-radius: 5px;
            border-color: #006976;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #006976;
            border-color: #006976;
            border-radius: 5px;
            font-size: 16px;
            padding: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #065b62;
            border-color: #065b62;
        }

        .login-box-body {
            padding: 20px;
        }

        .login-box-body .form-group {
            margin-bottom: 20px;
        }

        .login-box-body .form-group label {
            font-size: 14px;
            color: #006976;
        }

        .login-box-body .form-group input {
            font-size: 16px;
            padding: 12px;
            border-radius: 5px;
            margin-top: 5px;
            width: 100%;
        }

        .login-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #006976;
        }

        .login-footer a {
            color: #006976;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-box {
                width: 90%;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('img/logos/COMPLETO.png') }}" alt="Jb Technipack">
            </a>
        </div>
        <div class="login-box-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                    </div>
                </div>
            </form>
            <div class="login-footer">
                <!-- Opcionalmente, puedes agregar enlaces aquí, como "Olvidé mi contraseña" -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
</body>

</html>
