<!--@borrarextends('adminlte::auth.login')este es el original-->

@extends('admin.layout.login')

@section('title', 'Iniciar sesión')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Iniciar sesión</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Inicie sesión para acceder al sistema</p>

        <!-- Formulario de Login -->
        <form action="{{ route('login') }}" method="post">
            @csrf

            <!-- Campo de Correo Electrónico -->
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <!-- Campo de Contraseña -->
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <!-- Recordar Contraseña -->
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Recordarme
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- Enlaces -->
        <div class="social-auth-links text-center">
            <p>- O -</p>
            <a href="{{ route('password.request') }}" class="btn btn-block btn-warning">¿Olvidaste tu contraseña?</a>
        </div>

        <!-- Enlace a registro si es necesario -->
        
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
