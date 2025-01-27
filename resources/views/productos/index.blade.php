@extends('adminlte::page')

@section('title', 'Productos')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <!-- Título de la página -->
                <h2>Lista de Productos</h2>
                
                <!-- Botón para crear un nuevo producto (ubicado en la parte superior derecha) -->
                <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
            </div>
        </div>

        <!-- Filtro y tabla en el mismo contenedor -->
        <div class="row">
            <div class="col-md-12">
                <!-- Formulario de filtros (ubicado justo encima de la tabla) -->
                <form method="GET" action="{{ route('productos.index') }}">
                    <div class="card p-3 mb-3">
                        <div class="row">
                            <!-- Selector de Categoría -->
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

                            <!-- Buscador por título -->
                            <div class="col-md-6 col-sm-12 mb-2">
                                <label for="search">Buscar por título</label>
                                <input type="text" name="search" value="{{ request('search') }}" id="search" class="form-control" placeholder="Buscar por título">
                            </div>

                            <!-- Botón de Filtrar -->
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
                <!-- Tabla de productos -->
                <div class="card p-3">
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

                    <!-- Paginación -->
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

