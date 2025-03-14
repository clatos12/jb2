@extends('admin.layout.layout2')

@section('content')

<div class="container d-flex flex-column align-items-center mt-4">
    <h2 class="text-center mb-4">Editar Producto</h2> <!-- Centrado y con margen inferior -->

    <div class="col-lg-7">
        <form action="{{ route('productos.update', $producto->id) }}" method="post" enctype="multipart/form-data" class="p-4 bg-white">
            @csrf
            @method('PUT')

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
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $producto->titulo) }}" required />
            </div>

            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <!-- Campo Fotografía -->
            <div class="form-group">
                <label for="fotografia">Fotografía</label>
                <input type="file" class="form-control" id="fotografia" name="fotografia" />
                @if($producto->fotografia)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $producto->fotografia) }}" alt="Imagen actual" width="100" />
                    </div>
                @endif
            </div>

            <!-- Categoría Principal -->
            <div class="form-group">
                <label for="categoria_principal">Categoría Principal</label>
                <select class="form-control" id="categoria_principal" name="categoria_principal" required>
                    <option value="">Seleccione una categoría principal</option>
                    <option value="miscelaneos" {{ old('categoria_principal', $producto->categoria) == 'miscelaneos' ? 'selected' : '' }}>Misceláneos</option>
                    <option value="integraciones" {{ old('categoria_principal', $producto->categoria) == 'integraciones' ? 'selected' : '' }}>Integraciones</option>
                    <option value="divisores" {{ old('categoria_principal', $producto->categoria) == 'divisores' ? 'selected' : '' }}>Divisores</option>
                    <option value="charolas" {{ old('categoria_principal', $producto->categoria) == 'charolas' ? 'selected' : '' }}>Charolas</option>
                    <option value="cajas" {{ old('categoria_principal', $producto->categoria) == 'cajas' ? 'selected' : '' }}>Cajas</option>
                    <option value="bines" {{ old('categoria_principal', $producto->categoria) == 'bines' ? 'selected' : '' }}>Bines</option>
                    <option value="ceras" {{ old('categoria_principal') == 'ceras' ? 'selected' : '' }}>Ceras</option>
                </select>
            </div>

            <!-- Subcategoría -->
            <div class="form-group">
                <label for="categoria">Subcategoría</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="">Seleccione una subcategoría</option>
                </select>
            </div>

            <!-- Campo Estado -->
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" {{ old('estado', $producto->estado) == '1' ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ old('estado', $producto->estado) == '0' ? 'selected' : '' }}>No disponible</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Actualizar Producto</button>
            </div>
        </form>
    </div>
</div>

<!-- Espacio en blanco al final -->
<div style="margin-bottom: 50px;"></div>

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
            ceras: [{ value: 'ceras_cerasESD', text: 'Ceras ESD' }],
        };

        const categoriaPrincipal = document.getElementById('categoria_principal');
        const categoria = document.getElementById('categoria');

        categoriaPrincipal.addEventListener('change', (event) => {
            const seleccion = event.target.value;

            categoria.innerHTML = '<option value="">Seleccione una subcategoría</option>';

            if (subcategorias[seleccion]) {
                subcategorias[seleccion].forEach(subcat => {
                    const option = document.createElement('option');
                    option.value = subcat.value;
                    option.textContent = subcat.text;
                    categoria.appendChild(option);
                });
            }
        });

        const categoriaSeleccionada = "{{ old('categoria', $producto->categoria) }}";
        if (categoriaSeleccionada) {
            categoria.value = categoriaSeleccionada;
        }
    });
</script>

@endsection
