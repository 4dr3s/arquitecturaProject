<?php

namespace App\PATRON\DAO\User;

use App\Models\User;
use App\PATRON\DAO\Connection\connection;
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
}