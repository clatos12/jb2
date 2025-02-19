@extends('admin.layout.layout')

@section('title', 'Productos')

@section('content')
    
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
