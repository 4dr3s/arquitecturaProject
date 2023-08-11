<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\PATRON\DAO\User\UserDao;
use App\PATRON\DTO\User\UserDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $finduser = $userDAO->showUser();
        $users = [];
        foreach ($users as $user) {
            $users[] = new UserDTO(
                $finduser->id,
                $finduser->name,
                $finduser->email,
                $finduser->profileImage,
                $finduser->password,
                $finduser->estado,
                $finduser->isAdmin
            );
        }
        return view('admin.client.list', compact('users'));
    }
}
