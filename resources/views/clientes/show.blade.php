@extends('admin.layout.layout2')

@section('content')
<div class="container">
    <h1>Detalles de Contacto</h1>
    <p><strong>Nombre:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Teléfono:</strong> {{ $contact->phone }}</p>
    <p><strong>Asunto:</strong> {{ $contact->asunto }}</p>
    <p><strong>Mensaje:</strong> {{ $contact->message }}</p>
    <p><strong>Ubicación:</strong> {{ $contact->city }}, {{ $contact->state }}, {{ $contact->country }}</p>
    <p><strong>Fecha de contacto:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
