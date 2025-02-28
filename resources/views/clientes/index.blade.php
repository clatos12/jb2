@extends('admin.layout.layout2')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Contactos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->asunto }}</td>
                <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                <td><a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<!-- Paginación personalizada -->
<div class="pagination">
    {{ $contacts->links('pagination::custom') }}
</div>

@endsection
