@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Lista de Productos</h2>
            <hr>

            <!-- Botón para crear un nuevo producto -->
            <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

            <!-- Mostrar productos en una tabla -->
            <table class="table">
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
                                    <img src="{{ asset('storage/' . $producto->fotografia) }}" alt="Imagen de {{ $producto->titulo }}" style="width: 100px; height: 100px;">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                <!-- Botón para alternar el estado del producto -->
                                <form action="{{ route('productos.toggleEstado', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
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
@endsection
