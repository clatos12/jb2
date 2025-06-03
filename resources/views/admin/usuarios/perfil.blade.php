@extends('admin.layout.layout2')

@section('title', 'Perfil de Usuario')

@section('content')
<div class="container mt-4">
    <div class="card">
    <div class="card-header" style="background-color: #006976; color: white;">
            <h3 class="card-title">Perfil de Usuario</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('perfil.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mensajes de error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Campo de Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                </div>

                <!-- Campo de Correo Electrónico -->
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required disabled>
                </div>

                <!-- Campo de Contraseña Actual -->
                <div class="form-group">
                    <label for="current_password">Contraseña Actual</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                </div>

                <!-- Campo de Nueva Contraseña -->
                <div class="form-group">
                    <label for="password">Nueva Contraseña (Opcional)</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <!-- Campo de Confirmar Nueva Contraseña -->
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <!-- Botón de Actualización -->
                <button type="submit" class="btn" style="background-color: #006976; border-color: #006976; color: white;">Actualizar Perfil</button>
            </form>
        </div>
    </div>
</div>
@endsection
