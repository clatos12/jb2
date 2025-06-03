@extends('admin.layout.layout2')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container mt-4">
    <div class="card">
        <!-- Cabecera con color personalizado -->
        <div class="card-header" style="background-color: #006976; color: white;">
            <h3 class="card-title">Lista de Usuarios</h3>
        </div>
        <div class="card-body">
            <!-- Mensajes de éxito o error -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabla de usuarios -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <!-- Formulario para eliminar el usuario -->
                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
