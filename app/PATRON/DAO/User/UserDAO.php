<?php

namespace App\PATRON\DAO\User;

use App\Models\User;
use App\PATRON\DAO\Connection\connection;
use App\PATRON\DTO\User\UserDTO;
use Illuminate\Support\Facades\Auth;

class UserDao extends connection
{
    // Funcion para mostrar el usuario auntenticado
    public function showUser()
    {
        // Usuario autenticado
        $user = Auth::user();
        // retornar la variable con los datos respectivos al controlador
        return $user;
    }
    // Funcion para mostrar lista de usuarios
    public function showUserList()
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $users = User::on($sqlsrvDBConnection)->where('isAdmin',false)->paginate(10);
        // retornar la variable con los datos respectivos al controlador
        return $users;
    }
    // Funcion para registrar un nuevo usuario
    public function register(UserDTO $userDTO, $fileName, $estado, $isAdmin)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $user = User::on($sqlsrvDBConnection)->create([
            'name' => $userDTO->getName(),
            'email' => $userDTO->getEmail(),
            'profileImage' => $fileName,
            'isAdmin' => $isAdmin,
            'password' => $userDTO->getPassword(),
            'estado' => $estado
        ]);
        $user->profileImage = $fileName;
        $user->save();
        // retornar la variable con los datos respectivos al controlador
        return $user;
    }
    // Funcion para buscar un usuario
    public function searchUser($search)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $users = User::on($sqlsrvDBConnection)->where('name', 'LIKE', '%' . $search . '%')->orwhere('email', 'LIKE', '%' . $search . '%')->paginate(10);
        // retornar la variable con los datos respectivos al controlador
        return $users;
    }
    // Funcion para colocar el campo estado de un usuario en false
    public function modifyUser($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $user =  User::on($sqlsrvDBConnection)->findOrFail($id);
        $user['estado'] = 0;
        // retornar la variable con los datos respectivos al controlador
        $user->save();
    }
    // Funcion para colocar el campo estado de un usuario en true
    public function modifyUserActivate($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $user =  User::on($sqlsrvDBConnection)->findOrFail($id);
        $user['estado'] = 1;
        $user->save();
    }
    // Funcion para buscar un usuario por id
    public function searchUserId($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $users = User::on($sqlsrvDBConnection)->findOrFail($id);
        // retornar la variable con los datos respectivos al controlador
        return $users;
    }
}