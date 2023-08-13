<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\PATRON\DAO\User\UserDao;
use App\PATRON\DTO\User\UserDTO;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Funcion para registrar un nuevo usuario
    // Se pasa un request personalizado para validar tipo de datos, etc
    public function register(RegisterRequest $request)
    {
        // Generar un nombre para el archivo de su imagen especificando la extension del mismo
        $fileName = time().'.'.$request->profileImage->extension();
        // Guardar la imagen con el nombre anterior en la carpeta storage
        $request->profileImage->storeAs('public/Userimages',$fileName);
        // Validar los datos personalizados pasados como parametros
        $validated = $request->validated();   
        // Encriptar la password del cliente 
        $validated['password'] = Hash::make($validated['password']);

        // Validar si al momento de crear un usuario la cuenta es de un administrador
        // pasando datos especificos
        if (Auth::check() && Auth::guard('isAdmin')) {
            $estado = true;
            $isAdmin = true;
        }
        else{
            $estado = false;
            $isAdmin = false;
        }
        // Generar un objeto UserDTO pasando los parametros requeridos y validados anteriormente
        $userDTO = new UserDTO(
            $id = null,
            $validated['name'],
            $validated['email'],
            $fileName,
            $validated['password'],
            $estado,
            $isAdmin
        );
        // Generar un objeto UserDAO para acceder a los métodos correspondientes
        $userDAO = new UserDao();
        // Acceder al método register pasando los parametros requeridos
        $user = $userDAO->register($userDTO, $userDTO->getProfileImage(), $userDTO->getEstado(), $userDTO->getIsAdmin());
        // Una vez creada la cuenta manda un mensaje de confirmacion por correo electronico
        event(new Registered($user));
        // Logear al usuario registrado
        Auth::login($user);
        // Una vez logeado redirigir al HOME o la primera ruta del archivo web.php
        return redirect(RouteServiceProvider::HOME);
    }
}
