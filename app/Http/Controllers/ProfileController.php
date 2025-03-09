<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    // Mostrar el perfil del usuario
    public function index()
    {
        Session::put('page', 'perfil');

        return view('admin.usuarios.perfil');
    }

    // Actualizar perfil de usuario
    public function update(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'current_password' => 'required',
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'required_with:password|same:password', // Confirmación de contraseña
        ]);

        // Verificar si la contraseña actual es correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        // Actualizar el nombre del usuario
        $user->name = $request->name;

        // Si se ha proporcionado una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Guardar los cambios
        $user->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }

    // Crear usuario (vista para formulario de creación)
    public function create()
    {
        Session::put('page', 'usuarios.create');

        return view('admin.usuarios.crear');
    }

    // Almacenar usuario (guardar en la base de datos)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Crear un nuevo usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.create')->with('success', 'Usuario creado correctamente.');
    }
}
