@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Añadir un nuevo producto</h2>
            <hr>
            <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
                @csrf
                @method('POST')

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

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required />
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="fotografia">Fotografía</label>
                    <input type="file" class="form-control" id="fotografia" name="fotografia" />
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="{{ old('categoria') }}" required />
                </div>

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
        </div>
    </div>

@endsection
