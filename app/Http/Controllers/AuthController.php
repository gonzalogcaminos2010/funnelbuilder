<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso, ahora puedes iniciar sesión.');
    }


public function login()
{
    return view('auth.login');
}

public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        return redirect()->route('funnels.index')->with('success', 'Inicio de sesión exitoso.');
    }

    return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
}

public function logout()
{
    auth()->logout();
    return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente.');
}
}