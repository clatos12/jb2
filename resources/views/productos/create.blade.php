@extends('admin.layout.layout2')

@section('content')
    <style>
        .main-sidebar {
            background-color: #006976 !important;
        }

        .sidebar .nav-link {
            color: #ffffff !important;
        }

        .sidebar .nav-link:hover {
            background-color: #065b62 !important;
            color: #ffffff !important;
        }

        .sidebar .nav-link.active {
            background-color: #065b62 !important;
            color: #ffffff !important;
        }

        .sidebar .nav-icon {
            color: #ffffff !important;
        }

        .container {
            min-height: calc(100vh - 150px);
            padding-bottom: 50px;
        }

        .preview-container {
            width: 250px;
            height: 250px;
            overflow: hidden;
            border: 2px solid #ddd;
            display: none;
            margin: 20px auto;
        }

        #preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-text {
            display: none;
            font-size: 14px;
            color: #666;
            margin-top: 5px;
            text-align: center;
        }

        #descripcion {
            min-height: 100px;
            max-height: 300px;
            resize: vertical;
            overflow-y: auto;
            word-wrap: break-word;
            white-space: pre-wrap;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center mb-4">Añadir un nuevo producto</h2>
                <hr>
                <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="fotografia">Fotografía</label>
                        <input type="file" class="form-control" id="fotografia" name="fotografia" accept="image/*" onchange="previewImage(event)">
                        <br>
                        <div class="preview-container">
                            <img id="preview" src="#" alt="Vista previa de la imagen">
                        </div>
                        <p id="preview-text" class="preview-text">Esta es una simulación de la previsualización final.</p>
                    </div>

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

                    <div class="form-group">
                        <label for="categoria">Subcategoría</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <option value="">Seleccione una subcategoría</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>No disponible</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-success">Crear Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div style="height: 100px;"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const descripcion = document.getElementById("descripcion");

    descripcion.addEventListener("input", function () {
        this.style.height = "auto"; // Restablecer la altura
        this.style.height = this.scrollHeight + "px"; // Ajustar a su contenido
    });
});

        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.querySelector('.preview-container');
            const preview = document.getElementById('preview');
            const previewText = document.getElementById('preview-text');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                    previewText.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "#";
                previewContainer.style.display = 'none';
                previewText.style.display = 'none';
            }
        }

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
                divisores: [{ value: 'divisores', text: 'Divisores' }],
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

            document.getElementById('categoria_principal').addEventListener('change', function() {
                const subcat = subcategorias[this.value] || [];
                const categoria = document.getElementById('categoria');
                categoria.innerHTML = '<option value="">Seleccione una subcategoría</option>';
                subcat.forEach(({ value, text }) => categoria.appendChild(new Option(text, value)));
            });
        });
    </script>
@endsection
