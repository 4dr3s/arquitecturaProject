<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUser()
    {
        $user = Auth::user();
        return view('user.user', compact('user'));
    }

    public function showUserList()
    {
        $users = User::get();
        return view('admin.client.list', compact('users'));
    }
}
