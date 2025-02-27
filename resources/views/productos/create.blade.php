@extends('admin.layout.layout2')

@section('content')
    <style>
        /* Barra lateral con color principal */
        .main-sidebar {
            background-color: #006976 !important; /* Color principal */
        }

        /* Enlaces en la barra lateral */
        .sidebar .nav-link {
            color: #ffffff !important; /* Texto blanco */
        }

        /* Color de los enlaces al pasar el mouse */
        .sidebar .nav-link:hover {
            background-color: #065b62 !important; /* Color de fondo al pasar el mouse */
            color: #ffffff !important; /* Mantener el texto blanco */
        }

        /* Enlace seleccionado en la barra lateral */
        .sidebar .nav-link.active {
            background-color: #065b62 !important; /* Color secundario cuando se selecciona */
            color: #ffffff !important; /* Texto blanco */
        }

        /* Estilo de la barra lateral cuando está colapsada */
        .sidebar-collapse .nav-link {
            color: #ffffff !important;
        }

        /* Asegurarse de que los íconos de la barra lateral también se muestren blancos */
        .sidebar .nav-icon {
            color: #ffffff !important;
        }
    </style>
<div class="container">
    <div class="row">
        <h2>Añadir un nuevo producto</h2>
        <hr>
        <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
            @csrf

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Campo Título -->
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required />
            </div>

            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
            </div>

            <!-- Campo Fotografía -->
            <div class="form-group">
                <label for="fotografia">Fotografía</label>
                <input type="file" class="form-control" id="fotografia" name="fotografia" />
            </div>

            <!-- Categoría Principal -->
            <div class="form-group">
                <label for="categoria_principal">Categoría Principal</label>
                <select class="form-control" id="categoria_principal" name="categoria_principal" required>
                    <option value="">Seleccione una categoría principal</option>
                    <option value="miscelaneos" {{ old('categoria_principal') == 'miscelaneos' ? 'selected' : '' }}>Misceláneos</option>
                    <option value="integraciones" {{ old('categoria_principal') == 'integraciones' ? 'selected' : '' }}>Integraciones</option>
                    <option value="divisores" {{ old('categoria_principal') == 'divisores' ? 'selected' : '' }}>Divisores</option>
                    <option value="charolas" {{ old('categoria_principal') == 'charolas' ? 'selected' : '' }}>Charolas</option>
                    <option value="cajas" {{ old('categoria_principal') == 'cajas' ? 'selected' : '' }}>Cajas</option>
                    <option value="bines" {{ old('categoria_principal') == 'bines' ? 'selected' : '' }}>Bines</option>
                    <option value="ceras" {{ old('categoria_principal') == 'ceras' ? 'selected' : '' }}>Ceras</option>
                </select>
            </div>

            <!-- Subcategoría -->
            <div class="form-group" id="subcategoria-container">
                <label for="categoria">Subcategoría</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="">Seleccione una subcategoría</option>
                </select>
            </div>

            <!-- Campo Estado -->
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>No disponible</option>
                </select>
            </div>

            <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Crear Producto</button>
        </form>
        <h2> </h2>
        <h2> </h2>
        <h2> </h2>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const subcategorias = {
            miscelaneos: [
                { value: 'miscelaneos_tapetes_esd', text: 'Tapetes ESD' },
                { value: 'miscelaneos_bolsas_esd', text: 'Bolsas ESD' },
                { value: 'miscelaneos_bancos_esd', text: 'Bancos ESD' },
            ],
            integraciones: [
                { value: 'integraciones_mesas_trabajo', text: 'Mesas de Trabajo' },
                { value: 'integraciones_carros_lean', text: 'Carros Lean' },
                { value: 'integraciones_accesorios', text: 'Accesorios' },
            ],
            divisores: [
                { value: 'divisores', text: 'Divisores' },
            ],
            charolas: [
                { value: 'charolas_termoformadas', text: 'Charolas Termoformadas' },
                { value: 'charolas_inyectada', text: 'Charolas Inyectadas' },
                { value: 'charolas_eva_esd', text: 'Charolas EVA ESD' },
            ],
            cajas: [
                { value: 'cajas_inyectadas', text: 'Cajas Inyectadas' },
                { value: 'cajas_coroplast', text: 'Cajas Coroplast' },
                { value: 'cajas_carton', text: 'Cajas Cartón' },
            ],
            bines: [
                { value: 'bines_inyectado', text: 'Bines Inyectado' },
                { value: 'bines_corrugado', text: 'Bines Corrugado' },
            ],
            ceras: [
                { value: 'ceras_cerasESD', text: 'Ceras ESD' },
            ],
        };

        const categoriaPrincipal = document.getElementById('categoria_principal');
        const categoria = document.getElementById('categoria');
        const subcategoriaContainer = document.getElementById('subcategoria-container');

        categoriaPrincipal.addEventListener('change', (event) => {
            const seleccion = event.target.value;

            // Limpia las opciones de la subcategoría
            categoria.innerHTML = '<option value="">Seleccione una subcategoría</option>';

            // Agrega las nuevas opciones según la categoría principal seleccionada
            if (subcategorias[seleccion]) {
                subcategorias[seleccion].forEach(subcat => {
                    const option = document.createElement('option');
                    option.value = subcat.value;
                    option.textContent = subcat.text;
                    categoria.appendChild(option);
                });
            }
        });
    });
</script>

@endsection
