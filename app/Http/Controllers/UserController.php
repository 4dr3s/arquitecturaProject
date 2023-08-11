<?php

namespace App\Http\Controllers;

use App\PATRON\DAO\User\UserDao;
use App\PATRON\DTO\User\UserDTO;

class UserController extends Controller
{
    public function showUser()
    {
        $userDAO = new UserDao();
        $finduser = $userDAO->showUser();
        $user = new UserDTO(
            $finduser->id,
            $finduser->name,
            $finduser->email,
            $finduser->profileImage,
            $finduser->password,
            $finduser->estado,
            $finduser->isAdmin
        );
        return view('user.user', compact('user'));
    }

    public function showUserList()
    {
        $userDAO = new UserDao();
        $finduser = $userDAO->showUserList();
        // dd($finduser);
        $users = [];
        foreach ($finduser as $user) {
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
        return view('admin.client.list', compact('users'));
    }
}
