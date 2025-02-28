<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::query();

        // Filtrar por búsqueda si se proporciona
        if ($request->has('search')) {
            $contacts->where('name', 'like', '%' . $request->search . '%')
                     ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        // Ordenar según el parámetro 'order', por defecto ordena por fecha de creación
        $order = $request->get('order', 'desc');
        $contacts->orderBy('created_at', $order);

        // Aplicar paginación
        $contacts = $contacts->paginate(10);

        return view('clientes.index', compact('contacts'));
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('clientes.show', compact('contact')); 
    }
}
