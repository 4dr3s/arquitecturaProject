<?php

namespace App\Http\Controllers;

use App\PATRON\DAO\User\UserDao;
use App\PATRON\DTO\User\UserDTO;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser()
    {
        // Objeto DAO
        $userDAO = new UserDao();
        // Funcion para acceder a la operacion correspondiente
        $finduser = $userDAO->showUser();
        // Objeto DTO con los datos obtenidos
        $user = new UserDTO(
            $finduser->id,
            $finduser->name,
            $finduser->email,
            $finduser->profileImage,
            $finduser->password,
            $finduser->estado,
            $finduser->isAdmin
        );
        // Retornar la vista con los datos obtenidos
        return view('user.user', compact('user'));
    }

    public function showUserList()
    {
        // Objeto DAO
        $userDAO = new UserDao();
        // Funcion para acceder a la operacion correspondiente
        $finduser = $userDAO->showUserList();
        
        $users = [];
        // Recorrer la lista
        foreach ($finduser as $user) {
            // Objeto DTO con los datos obtenidos
            $users[] = new UserDTO(
                $user->id,
                $user->name,
                $user->email,
                $user->profileImage,
                $user->password,
                $user->estado,
                $user->isAdmin
            );
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.client.list', compact('users','finduser'));
    }

    public function searchUser(Request $request){
        // Objeto DAO
        $userDAO = new UserDao();
        // Funcion para acceder a la operacion correspondiente para la busqueda
        $finduser = $userDAO->searchUser($request->search);

        $users = [];
        // Recorrer la lista
        foreach ($finduser as $user) {
            // Objeto DTO con los datos obtenidos
            $users[] = new UserDTO(
                $user->id,
                $user->name,
                $user->email,
                $user->profileImage,
                $user->password,
                $user->estado,
                $user->isAdmin
            );
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.client.list', compact('users','finduser'));
    }

    public function modifyUser($id)
    {
        // Objeto DAO
        $userDAO = new UserDao();
        // Funcion para acceder a la operacion correspondiente para la busqueda
        $userDAO->modifyUser($id);
        // Llamada al metodo correspondiente del mismo controlador
        return $this->showUserList();
    }

    public function modifyUserActivate($id)
    {
        // Objeto DAO
        $userDAO = new UserDao();
        // Funcion para acceder a la operacion correspondiente para la busqueda
        $userDAO->modifyUserActivate($id);
        // Llamada al metodo correspondiente del mismo controlador
        return $this->showUserList();
    }
}
