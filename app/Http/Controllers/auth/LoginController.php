<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Funcion para logear
    public function login(LoginRequest $request)
    {
        // Condicional para validar la peticion desde la vista que contiene usuario y contraseña y un token de recuerdame
        if (Auth::attempt($request->validated(), $remember = true)) {
            // Validar si la cuenta tiene el campo estado en true
            if(Auth::guard('activateAccount')){
                return redirect('/');
            }
            // Si no cumple con la condicion anterior retorna a la vista de login especificando el error
            return back()->withErrors([
                'login' => 'Cuenta Desactivada',
            ]);
        }
        // Si no cumple con la condicion primera retorna a la vista de login especificando el error
        return back()->withErrors([
            'login' => 'Credenciales No Encontradas',
        ]);
    }

    // Funcion para cerrar sesión
    public function logOut(Request $request)
    {
        // Cerrar la sesión
        Auth::logout();
        // Eliminar los datos que existe por cada session como el carrito de compras
        $request->session()->invalidate();
        // Regenerar el token unico para cada usuario
        $request->session()->regenerateToken();
        // Redireccionar a la primera ruta del archivo web.php
        return redirect('/');
    }
}
