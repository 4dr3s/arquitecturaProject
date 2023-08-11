<?php

namespace App\PATRON\DAO\User;

use App\Models\User;
use App\PATRON\DAO\Connection\connection;
use App\PATRON\DTO\User\UserDTO;
use Illuminate\Support\Facades\Auth;

class UserDao extends connection
{
    public function showUser()
    {
        $user = Auth::user();
        return $user;
    }
    
    public function showUserList()
    {
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();

        $users = User::on($sqlsrvDBConnection)->get();
        return $users;
    }

    public function register(UserDTO $userDTO, $fileName, $estado, $isAdmin)
    {
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();

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
        return $user;
    }
}